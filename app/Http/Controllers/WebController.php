<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Connect;
use App\Models\Industrie;
use App\Models\IndustrieCategory;
use App\Models\Lang;
use App\Models\News;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Translation;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $services = Service::with('serviceImage', 'serviceCategory')->get()->toArray();
        $services  = array_chunk($services, 4);
        // dd($services);
        $industries = Industrie::with('industrieCategory')->get();
        $industriescategories = IndustrieCategory::all();
        $about = About::first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
   
        return view('index', compact(
            'banners',
            'services',
            'industries',
            'industriescategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function industries()
    {
        $industries = Industrie::with('industrieCategory')->paginate(10);
        $industriescategories = IndustrieCategory::all();
        $about = About::first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('industries', compact(
            'industries',
            'industriescategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function industries_inner($industryCategory_id)
    {
        $about = About::latest()
            ->first();
        $industries = Industrie::with('industrieCategory')
            ->where('industryCategory_id', $industryCategory_id)
            ->paginate(6);
        $industriescategories = IndustrieCategory::where('id', $industryCategory_id)->first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('industries-inner', compact(
            'industries',
            'industriescategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function about()
    {
        $about = About::first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('about', compact(
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function news()
    {
        $about = About::first();
        $news = News::all();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('news', compact(
            'about',
            'lang',
            'news',
            'langs',
            'translations'
        ));
    }

    public function news_inner($id)
    {
        $new = News::findOrFail($id);
        $about = About::first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('news-inner', compact(
            'about',
            'lang',
            'new',
            'langs',
            'translations'
        ));
    }

    public function services()
    {
        $about = About::first();
        $servicecategories = ServiceCategory::all();
        $services = Service::with('serviceImage', 'serviceCategory')->paginate(10);
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('services', compact(
            'services',
            'servicecategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function services_inner($serviceCategory_id)
    {
        $about = About::latest()
            ->first();
        $services = Service::with('serviceImage', 'serviceCategory')
            ->where('serviceCategory_id', $serviceCategory_id)
            ->paginate(6);
        $servicecategories = ServiceCategory::all();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('services-inner', compact(
            'services',
            'servicecategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function services_show($id)
    {
        $services = Service::with('serviceImage', 'serviceCategory')->findOrFail($id);
        $about = About::latest()
            ->first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('services-show', compact(
            'services',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function industries_show($id)
    {
        $industries = Industrie::with('industrieCategory')->findOrFail($id);
        $about = About::latest()
            ->first();
        $industriescategories = IndustrieCategory::all();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('industries-show', compact(
            'industries',
            'industriescategories',
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function connect()
    {
        $about = About::latest()
            ->first();
        $lang = \App::getLocale();
        $langs = Lang::all();
        $translations = Translation::all();
        // $lang = \App::getLocale();
        return view('connect', compact(
            'lang',
            'about',
            'langs',
            'translations'
        ));
    }

    public function order(Request $request)
    {

        $data = $request->all();
        $data['phone'] = $request->phone;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        Connect::create($data);

        return back()->with([
            'success' => true,
            'message' => 'We will contact you soon!'
        ]);
    }
}
