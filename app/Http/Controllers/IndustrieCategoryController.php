<?php

namespace App\Http\Controllers;

use App\Models\IndustrieCategory;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IndustrieCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industricategories = IndustrieCategory::latest()->paginate(10);
        return view('app.industricategory.index', compact('industricategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.industricategory.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @dd($request->all());
        $request->validate([
            'title.en' => 'required|min:1|max:255',
            'icon' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
        // dd($request->title);

        $industricategory = new IndustrieCategory();
        $industricategory->title = $request->title;
        $industricategory->subtitle = $request->subtitle;
        if($request->hasfile('icon'))
        {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/icon/', $filename);
            $industricategory->icon = $filename;
        }
        $industricategory->save();
        return redirect()->route('industricategories.index')->with('message', "Industry category added successfully");
    }

    public function delete_icon(Request $request){
        // @dd($request);
        $files = IndustrieCategory::find($request->id);
        if(!$files){
            return redirect()->back()->withErrors('message', 'Icon not found');
        }
        $destination = 'uploads/icon/'.$files->icon;
        // @dd($destination);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'icon' => null
        ]);
        // return redirect()->back()->with('message', 'Icon Delete Successfully');
        return response()->json(["message"  =>  "Icon delete successfully"], 200);
    }

    public function upload_icon(Request $request)
    {
        
        // $request->validate([
        //     'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        // ]);

        $news = IndustrieCategory::find($request->id);
        // @dd($request->id);
        // $file = $request->file('icon');
        // $extention = $file->getClientOriginalExtension();
        // $filename = time() . '.' . $extention;
        // $file->move('uploads/icon/', $filename);
        // $news->icon = $filename;

        if ($request->hasfile('icon')) {
            $file = $request->file('icon');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/icon/', $filename);
            $news->icon = $filename;
        }


        $news->save();

        return response()->json(["message"  =>  "Image upload successfully"], 200);
        // return redirect()->back()->with('message', 'Icon Upload Successfully');
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
        $industricategory = IndustrieCategory::findOrFail($id);
        $languages = Lang::all();
        return view('app.industricategory.edit', compact('industricategory', 'languages'));
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
            // 'icon' => 'required|min:1|max:255',
            'title.en' => 'required|min:1|max:255'
        ]);

        $industricategory = IndustrieCategory::find($id);
      
        $industricategory->title = $request->title;
        $industricategory->subtitle = $request->subtitle;
        // $industricategory->icon = $request->icon;
        $industricategory->update();
        return redirect()->route('industricategories.index')->with('message', 'Industry category edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industricategory = IndustrieCategory::find($id);
        $industricategory->delete();
        return redirect()->back()->with('message', 'Industry category delete successfully');
    }
}
