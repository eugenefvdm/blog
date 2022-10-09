<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::name('home')->get('/home', function () {
    return view('blog.index');
});

// Blog routes
Route::name('blog')->get('/blog', [PostController::class, 'index']);

Route::get('/blog/category/{category}', [CategoryController::class, 'show'])
    ->name('category');
    
Route::get('/blog/{post}', [PostController::class, 'show'])
    ->name('post');
// End blog routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
