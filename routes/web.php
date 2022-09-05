<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerCantroller;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustrieCategoryController;
use App\Http\Controllers\IndustrieController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TranslationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Models\Industrie;
use App\Models\IndustrieCategory;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
// use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {    
    Route::post('upload-image', [HomeController::class, 'uploadImage'])->name('upload-image');
    Route::resource('abouts', AboutController::class);  
    Route::post('/delete-image-about', [AboutController::class, 'delete_image_about'])->name('delete-image-about');
    Route::post('upload-about-image', [AboutController::class, 'upload_about_image'])->name('upload-about-image');
    Route::resource('langs', LangController::class);
    Route::post('/translations/search', [TranslationController::class, 'search'])->name('translation.search');
    Route::resource('translations', TranslationController::class);
    Route::resource('applications', ConnectController::class);
    Route::resource('news', NewController::class);
    Route::post('/delete-image-news', [NewController::class, 'delete_image_news'])->name('delete-image-news');
    Route::post('upload-news-image', [NewController::class, 'upload_news_image'])->name('upload-news-image');
    Route::resource('servicecategories', ServiceCategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::post('/delete-image', [ServiceController::class, 'deleteImage'])->name('delete-image');
    Route::post('upload-service-image', [ServiceController::class, 'uploadImage'])->name('upload-service-image');
    Route::resource('industricategories', IndustrieCategoryController::class);
    Route::resource('industries', IndustrieController::class);
    Route::post('/delete-image-industrie', [IndustrieController::class, 'delete_image_industrie'])->name('delete-image-industrie');
    Route::post('upload-industrie-image', [IndustrieController::class, 'upload_industrie_image'])->name('upload-industrie-image');
    Route::resource('users', UserController::class);
    Route::post('/delete-icon', [IndustrieCategoryController::class, 'delete_icon'])->name('delete-icon');
    Route::post('upload-icon', [IndustrieCategoryController::class, 'upload_icon'])->name('upload-icon');
    Route::resource('banners', BannerCantroller::class);
    Route::post('/delete-image-banners', [BannerCantroller::class, 'delete_image_banners'])->name('delete-image-banners');
    Route::post('upload-banners-image', [BannerCantroller::class, 'upload_banners_image'])->name('upload-banners-image');

});


Auth::routes();

Route::group(['prefix'  =>  App\Http\Middleware\LocaleMiddleware::getLocale(), 'middleware' => 'locale'], function(){
    Route::get('/admin', [HomeController::class, 'index'])->name('admin');
    Route::get('/', [WebController::class, 'index'])->name('index');
    Route::get('/industries', [WebController::class, 'industries'])->name('industries');
    Route::get('/industries-inner/{industryCategory_id}', [WebController::class, 'industries_inner'])->name('industries-inner');
    Route::get('/about', [WebController::class, 'about'])->name('about');
    Route::get('/news', [WebController::class, 'news'])->name('news');
    Route::get('/news/{id}', [WebController::class, 'news_inner'])->name('news_inner');
    Route::get('/services', [WebController::class, 'services'])->name('services');
    Route::get('/services-inner/{serviceCategory_id}', [WebController::class, 'services_inner'])->name('services-inner');
    Route::get('/services/{id}', [WebController::class, 'services_show'])->name('services-show');
    Route::get('/industries/{id}', [WebController::class, 'industries_show'])->name('industries-show');
    Route::get('/connect', [WebController::class, 'connect'])->name('connect');
    Route::get('/order', [WebController::class, 'order'])->name('order');
});





// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Переключение языков
Route::get('setlocale/{lang}', function ($lang) {
    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы

    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[1], App\Http\Middleware\LocaleMiddleware::$languages)) {

        unset($segments[1]); //удаляем метку
    }

    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    if ($lang != App\Http\Middleware\LocaleMiddleware::$mainLanguage){
        array_splice($segments, 1, 0, $lang);
    }

    //формируем полный URL
    // dd($lang);
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }

    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');