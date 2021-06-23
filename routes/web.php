<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;

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


Route::get('/', [HomePageController::class,'index'] )->name('homepage');
Route::get('/iletisim', [HomePageController::class,'contact'] )->name('contact');
Route::post('/iletisim', [HomePageController::class,'contactPost'] )->name('contact-post');
Route::get('/kategori/{category}', [HomePageController::class,'showCategory'] )->name('blog-category');
Route::get('/{category}/{slug}', [HomePageController::class,'showPost'] )->name('blog-single');
Route::get('/{sayfa}', [HomePageController::class,'page'] )->name('pages');




