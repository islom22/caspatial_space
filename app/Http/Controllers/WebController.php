<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Connect;
use App\Models\Industrie;
use App\Models\IndustrieCategory;
use App\Models\News;
use App\Models\Service;
use App\Models\ServiceCategory;
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
        return view('index', compact(
            'banners',
            'services',
            'industries',
            'industriescategories',
            'about'
        ));
    }

    public function industries()
    {
        $industries = Industrie::with('industrieCategory')->paginate(10);
        $industriescategories = IndustrieCategory::all();
        $about = About::first();
        return view('industries', compact(
            'industries',
            'industriescategories',
            'about'
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
        return view('industries-inner', compact(
            'industries',
            'industriescategories',
            'about'
        ));
    }

    public function about()
    {
        $about = About::first();
        return view('about', compact(
            'about'
        ));
    }

    public function news()
    {
        $about = About::first();
        $news = News::all();
        return view('news', compact(
            'about',
            'news'
        ));
    }

    public function news_inner($id)
    {
        $new = News::findOrFail($id);
        $about = About::first();
        return view('news-inner', compact(
            'about',
            'new'
        ));
    }

    public function services()
    {
        $about = About::first();
        $servicecategories = ServiceCategory::all();
        $services = Service::with('serviceImage', 'serviceCategory')->paginate(10);
        return view('services', compact(
            'services',
            'servicecategories',
            'about'
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
        return view('services-inner', compact(
            'services',
            'servicecategories',
            'about'
        ));
    }

    public function services_show($id)
    {
        $services = Service::with('serviceImage', 'serviceCategory')->findOrFail($id);
        $about = About::latest()
            ->first();
        return view('services-show', compact(
            'services',
            'about'
        ));
    }

    public function industries_show($id)
    {
        $industries = Industrie::with('industrieCategory')->findOrFail($id);
        $about = About::latest()
            ->first();
        $industriescategories = IndustrieCategory::all();
        return view('industries-show', compact(
            'industries',
            'industriescategories',
            'about'
        ));
    }

    public function connect()
    {
        $about = About::latest()
            ->first();
        return view('connect',compact(
            'about'
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
            'message' => 'Заказ оформлен! Скоро с вами свяжемся'
        ]);
    }
}
