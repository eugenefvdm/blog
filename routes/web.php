<?php

use App\Enums\Pricing;
use App\Enums\Features;
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

Route::feeds();

Route::get('/admin-panel', function () {
    return redirect('/admin');
})->name('admin');

Route::get('/', [PostController::class, 'index'])
    ->name('home');

Route::get('/', [PostController::class, 'index'])
    ->name('blog');

Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->name('category');

Route::get('/{category}/{post}', [PostController::class, 'show'])
    ->name('post');

Route::get('/sponsor', function () {
    return view('sponsor', [
        'plans' => Pricing::plans(),
        'features' => Features::all(),
        'icons' => Features::icons(),
    ]);
})->name('sponsor');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
