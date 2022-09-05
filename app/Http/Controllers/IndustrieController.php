<?php

namespace App\Http\Controllers;

use App\Models\Industrie;
use App\Models\IndustrieCategory;
use App\Models\Lang;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndustrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industries = Industrie::with('industrieCategory')->paginate(10);
        $industriescategories = IndustrieCategory::all();
        return view('app.industrie.index', compact(
            'industriescategories',
            'industries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        $industriescategories = IndustrieCategory::all();
        $lang = \App::getLocale();
        return view('app.industrie.create', compact(
            'languages',
            'industriescategories',
            'lang'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title.en' => 'required|min:1|max:255',
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        // dd($request->title);

        $industrie = new Industrie();
        $industrie->title = $request->title;
        $industrie->desc = $request->desc;
        $industrie->industryCategory_id = $request->industryCategory_id;
        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/industrie/', $filename);
            $industrie->img = $filename;
        }
        $industrie->save();
        return redirect()->route('industries.index')->with('message', "Industry added successfully");
    }

    public function delete_image_industrie(Request $request)
    {
        // @dd($request);
        if (!$files = Industrie::find($request->id)) {
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/industrie/' . $files->img;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);
        return response()->json(["message"  =>  "Successfully deleted"], 200);
        // return redirect()->back()->with('message', 'Image Delete Successfully');

    }

    public function upload_industrie_image(Request $request)
    {

        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $industrie = Industrie::find($request->id);

        $file = $request->file('img');
        $extention = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extention;
        $file->move('uploads/industrie/', $filename);
        $industrie->img = $filename;


        $industrie->save();
        return redirect()->back()->with('message', 'Image upload successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Category::find($id);
        // return view('app.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industrie = Industrie::with('industrieCategory')->findOrFail($id);
        $languages = Lang::all();
        $industriescategories = IndustrieCategory::all();
        $lang = \App::getLocale();
        return view('app.industrie.edit', compact(
            'industrie',
            'languages',
            'industriescategories',
            'lang'
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

            'title.en' => 'required|min:1|max:255'
        ]);

        $industrie = Industrie::find($id);

        $industrie->title = $request->title;
        $industrie->desc = $request->desc;
        $industrie->industryCategory_id = $request->industryCategory_id;
        $industrie->update();
        return redirect()->route('industries.index')->with('message', 'Industry edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industrie = Industrie::find($id);
        $industrie->delete();
        return redirect()->back()->with('message', 'Industry delete successfully');
    }
}
