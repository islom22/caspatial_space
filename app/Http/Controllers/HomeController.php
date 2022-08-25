<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Termwind\Components\Dd;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function component(){
        return view('component.main_page');
    }


    public function delete_image_news(Request $request){
        @dd($request);
        if(!$files = News::find($request->id)){
            return redirect()->back()->withErrors('message', 'Image not found');
        }
        $destination = 'uploads/news/'.$files->img;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $files->update([
            'img' => null
        ]);
        return redirect()->back()->with('message', 'Image Delete Successfully');
        
    }

      // upload image for CKEditor
      public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $fileName = time().'.'.$request->file('upload')->getClientOriginalExtension();

            $request->file('upload')->move(public_path('upload'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('upload/'.$fileName);
            $msg = 'Image upload successfully!';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
