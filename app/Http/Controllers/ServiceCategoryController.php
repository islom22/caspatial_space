<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicecategories = ServiceCategory::latest()->paginate(10);
        return view('app.servicecategory.index', compact('servicecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Lang::all();
        return view('app.servicecategory.create', compact('languages'));
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
            'title.ru' => 'required|min:1|max:255'
        ]);
        // dd($request->title);

        $sevicecategory = new ServiceCategory();
        $sevicecategory->title = $request->title;
        $sevicecategory->save();
        return redirect()->route('servicecategories.index')->with('message', "Service category added successfully");
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
        $servicecategory = ServiceCategory::findOrFail($id);
        $languages = Lang::all();
        return view('app.servicecategory.edit', compact('servicecategory', 'languages'));
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
            
            'title.ru' => 'required|min:1|max:255'
        ]);

        $servicecategory = ServiceCategory::find($id);
      
        $servicecategory->title = $request->title;
        $servicecategory->update();
        return redirect()->route('servicecategories.index')->with('message', 'Service category edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicecategory = ServiceCategory::find($id);
        $servicecategory->delete();
        return redirect()->back()->with('message', 'Service category delete successfully');
    }
}
