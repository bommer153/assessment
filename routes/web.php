<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\http\Controllers\PostsController;
use App\http\Controllers\ProfileController;
use App\http\Controllers\AuthController;

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
Route::group(['middleware' => ['guest']], function () {


    Route::get('/login', [AuthController::class,'login'])->name('login');
    Route::post('/login', [AuthController::class,'elogin'])->name('elogin');
    Route::get('/register', [AuthController::class,'registerPage'])->name('registerPage');
    Route::post('/register', [AuthController::class,'register'])->name('register');


});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout',  [AuthController::class,'logout'])->name('logout');
    
    //Posts
    Route::get('/', [PostsController::class,'index'])->name('home');
    Route::post('/', [PostsController::class,'store'])->name('storePost');
    Route::get('posts/{slug}', [PostsController::class,'show'])->name('showPost');
    Route::put('posts/{id}', [PostsController::class,'update'])->name('updatePost');
    Route::delete('posts/{id}', [PostsController::class,'destroy'])->name('deletePost');
    
    //
    Route::get('/profile', [ProfileController::class,'index'])->name('profile');
    Route::put('/profile', [ProfileController::class,'updateProfile'])->name('updateProfile');
    Route::put('/password', [ProfileController::class,'changePassword'])->name('changePassword');

});


