<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\CategoryController;



/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------

*/

Route::prefix('admin')->middleware('isLogin')->group(function(){
    Route::get('login',[AuthController::class,'login'])->name('login');
    Route::post('login',[AuthController::class,'loginPost'])->name('login-post');
});

Route::prefix('admin')->middleware('isAdmin')->group(function(){
    Route::get('panel',[DashboardController::class,'index'])->name('dashboard');
    //Articles Routes
    Route::get('/makaleler/silinenler',[ArticleController::class,'trashed'])->name('trashed');
    Route::get('/makaleler/silinenler/{id}',[ArticleController::class,'deleteTrashed'])->name('deleteTrashed');
    Route::get('/restore/{id}',[ArticleController::class,'restore'])->name('restore');
    Route::resource('makaleler',ArticleController::class);
    Route::get('/switch',[ArticleController::class,'switch'])->name('switch');
    
    //Categories Routes
    Route::get('/kategoriler',[CategoryController::class,'index'])->name('categories');
    Route::post('/kategoriler/create',[CategoryController::class,'create'])->name('categories.create');
    Route::get('/kategoriler/switch',[CategoryController::class,'switch'])->name('categories.switch');



    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});



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


