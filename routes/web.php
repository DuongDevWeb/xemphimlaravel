<?php

use App\Http\Controllers\Admin\Category\CategoryHome;
use App\Http\Controllers\Admin\Country\CountryHome;
use App\Http\Controllers\Admin\Dashboad\DashboadController;
use App\Http\Controllers\Admin\Genre\GenreHome;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\LeechMovie\LeechMoieController;
use App\Http\Controllers\Admin\Login\LoginController;
use App\Http\Controllers\Admin\Movie\MovieController;
use App\Http\Controllers\Admin\Server\ServerController;
use App\Http\Controllers\Fontend\UserFontend\UserFontedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// đã xong login
Route::get('login_Admin_Uer_Web', [LoginController::class, 'login_Admin_Uer_Web'])->name('login_Admin_Uer_Web');
Route::post('loginHome', [LoginController::class, 'loginHome'])->name('loginHome');

//  home của admin 
// 
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');

    //  category 

    // thông kê

    Route::get('dashboard', [DashboadController::class, 'dashboard'])->name('dashboard');
    //  category
    Route::get('category/hide-all', [CategoryHome::class, 'hideAll'])->name('category.hideAll');
    Route::get('category/on-all', [CategoryHome::class, 'onAll'])->name('category.onAll');
    Route::resource('category', CategoryHome::class);



    // contry
    Route::get('country/hide-all', [CountryHome::class, 'hideAll'])->name('country.hideAll');
    Route::get('country/on-all', [CountryHome::class, 'onAll'])->name('country.onAll');
    Route::resource('country', CountryHome::class);
    // genre


    Route::resource('genre', GenreHome::class);



    // server
    Route::resource('server', ServerController::class);
    // movie
    Route::resource('movie', MovieController::class);

    // api cho phim loại bộ vì api cho video quá lag
    Route::get('leechMovie', [LeechMoieController::class, 'leechMovie'])->name('leechMovie');
});


// 
// Giao diện người


// trang chur

Route::get('/', [UserFontedController::class, 'Homeplay'])->name('Homeplay');
// thetrr loại

Route::get('the-loai', [UserFontedController::class, 'genreHome'])->name('genreHome');
Route::get('/the-loai/{slug}', [UserFontedController::class, 'genre'])->name('genre');
//  quốc gia

Route::get('quoc-gia', [UserFontedController::class, 'countryHome'])->name('countryHome');
Route::get('quoc-gia/{slug}', [UserFontedController::class, 'country'])->name('country');

//  tạo để xem
Route::get('/danh-muc/{slug}', [UserFontedController::class, 'category'])->name('category');

Route::get('/xem-phim-sex-mien-phi/{slug}', [UserFontedController::class, 'movie'])->name('movie');

//  movie mới


// search tuwf data từ aajx hoặc là js 
// sử dụng laravel

Route::get('/search',[UserFontedController::class,'search'])->name('search');

Route::get('/tag/{tag}', [UserFontedController::class, 'videosByTag'])->name('tag.videos');





