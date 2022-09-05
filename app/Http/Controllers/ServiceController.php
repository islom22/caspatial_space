<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('serviceImage','serviceCategory')
            ->paginate(10);
        $servicecategories = ServiceCategory::all();

        return view('app.service.index', compact(
            'services',
            'servicecategories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicecategories = ServiceCategory::all();
        $languages = Lang::all();
        $services = Service::all();
        $lang = \App::getLocale();
        return view('app.service.create', compact(
            'servicecategories',
            'services',
            'languages',
            'lang'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function uploadImage(Request $request)
    {
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $service = Service::find($request->id);
        $item = $request->file('img');
        if ($request->hasFile('img')) {
            $image_name = md5(rand(1000, 10000));
            $ext = strtolower($item->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $uploade_path = 'upload/service/';
            $image_url = $uploade_path . $image_full_name;
            $item->move($uploade_path, $image_full_name);

            ServiceImage::create([
                'img' => $image_url,
                'service_id' => $service->id
            ]);
            return response()->json(["message"  =>  "Image upload successfully"], 200);
            // return redirect()->back()->with('message', 'Image Upload Successfully');
        }
        // return redirect()->back()->withErrors('message', 'Image Upload Error');
        return response()->json(["message"  =>  "Image upload successfully"], 200);
    }

    public function deleteImage(Request $request){

        if(!$files = ServiceImage::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        // @dd('sdfsdfs');
        $destination = 'upload/service/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->delete();
        return response()->json(["message"  =>  "Successfully deleted"], 200);
        // return redirect()->back()->with('message', 'Image Delete Successfully');
        }

    public function store(Request $request)
    {
        $data = $request->all();
        // @dd($data);  
        $request->validate([
            'title.en' => 'required|max:255',
            'title' => 'required',
            // 'serviceCategory' => 'required',
            'img.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img' => 'required'
        ]);
            // $data["img"] = "noimage";
        $service = Service::create($data);
        
        if ($request->hasFile('img')) {
            foreach ($request->file('img') as $item) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($item->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $uploade_path = 'upload/service/';
                $image_url = $uploade_path . $image_full_name;
                $item->move($uploade_path, $image_full_name);

                ServiceImage::create([
                    'img' => $image_url,
                    'service_id' => $service->id
                ]);
            }

            return redirect()->route('services.index')->with('message', 'Service added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $services = Service::find($id);
    //     $servicecategories = Service::with('category')->get();
    //     return view('app.services.show',compact('services','servicecategories'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicecategories = ServiceCategory::all();
        $service = Service::with('serviceImage')->findOrFail($id);
        $languages = Lang::all();
        $lang = \App::getLocale();
        // $image = ProductImage::all();
        return view('app.service.edit', compact(
            'service',
            'servicecategories',
            'languages',
            'lang'
            // 'image'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'title.en' => 'required',
            // 'serviceCategory_id' => 'required',
            // 'img.*' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'img' => 'required'
        ]);

        $service =  Service::find($id);
        $service->serviceCategory_id = $request->input('serviceCategory_id');
        $service->title = $request->input('title');
        $service->subtitle = $request->input('subtitle');
        $service->desc = $request->input('desc');
            $service->update();
            // dd($service);
            return redirect()->route('services.index')->with('message', 'Service edit successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);
        $destination = 'uploads/service/' . $services->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $services->delete();
        return back()->with('message', 'Service delete successfully');
    }

    public function services($serviceCategory = null)
    {
        $services = Service::all();
        $servicecategories = ServiceCategory::all();
        if ($serviceCategory) {
            $services = Service::where(
                'serviceCategory',
                $serviceCategory
            )->get();
        }

        return view('main.services', compact(
            'services',
            'servicecategories'
        ));
    }

}
