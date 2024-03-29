<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [FrontEndController::class, 'beranda']);
Route::get('/berita/{slug}', [FrontEndController::class, 'post']);
Route::get('/berita', [FrontEndController::class, 'postingan']);

Route::get('/citra', [FrontEndController::class, 'citra']);
Route::get('/ibf', [FrontEndController::class, 'ibf']);
Route::get('/display', [FrontEndController::class, 'display']);
Route::get('/gempa', [FrontEndController::class, 'gempa']);
Route::get('/profil', [FrontEndController::class, 'profil']);

Route::get('/template', function () {
    return view('frontend.basetemplate');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    });
    Route::get('/display/pertamina-baubau', function () {
        return view('frontend.display.pertamina-baubau');
    });
    Route::get('/display/pertamina-kendari', function () {
        return view('frontend.display.pertamina-kendari');
    });

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('tags', App\Http\Controllers\TagController::class);

    // Manage Posts
    Route::get('posts/trash', [App\Http\Controllers\PostController::class, 'trash'])->name('posts.trash');
    Route::post('posts/trash/{id}/restore', [App\Http\Controllers\PostController::class, 'restore'])->name('posts.restore');
    Route::delete('posts/{id}/delete-permanent', [App\Http\Controllers\PostController::class, 'deletePermanent'])->name('posts.deletePermanent');
    Route::resource('posts', App\Http\Controllers\PostController::class);
});
