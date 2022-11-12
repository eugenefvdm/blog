<?php

use App\Enums\Features;
use App\Enums\Pricing;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Mail\ContactForm;
use App\Services\Settings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [PostController::class, 'index'])
    ->name('home');

Route::get('/', [PostController::class, 'index'])
    ->name('blog.index');

Route::get('/category/{category}', [CategoryController::class, 'show'])
    ->name('blog.category');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('blog.categories');

Route::get('/tag/{tag}', [TagController::class, 'show'])
    ->name('blog.tag');

Route::get('/tags', [TagController::class, 'index'])
    ->name('blog.tags');

Route::get('/tag-cloud', [TagController::class, 'cloud'])
    ->name('blog.tag-cloud');

Route::get('/{category}/{post}', [PostController::class, 'show'])
    ->name('blog.post.show');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/confirmation', function () {
    Mail::to(Settings::contactEmail())
        ->send(new ContactForm(request()->all()));

    return view('contact-confirmation');
})->name('contact-confirmation');

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
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
