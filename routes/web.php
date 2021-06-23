<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;;



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------

*/

Route::get('/admin/panel',[DashboardController::class,'index'])->name('dashboard');
Route::get('/admin/login',[AuthController::class,'login'])->name('login');


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/


Route::get('/', [HomePageController::class,'index'] )->name('homepage');
Route::get('/iletisim', [HomePageController::class,'contact'] )->name('contact');
Route::post('/iletisim', [HomePageController::class,'contactPost'] )->name('contact-post');
Route::get('/kategori/{category}', [HomePageController::class,'showCategory'] )->name('blog-category');
Route::get('/{category}/{slug}', [HomePageController::class,'showPost'] )->name('blog-single');
Route::get('/{sayfa}', [HomePageController::class,'page'] )->name('pages');


