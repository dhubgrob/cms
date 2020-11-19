<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;

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

Route::get('home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index')->middleware('auth');

Route::get('categories/new', [CategoriesController::class, 'create'])->name('categories.create')->middleware('auth');

Route::post('categories/store', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');

Route::get('categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit')->middleware('auth');

Route::post('categories/{category}/update', [CategoriesController::class, 'update'])->name('categories.update');

Route::post('categories/{category}/delete', [CategoriesController::class, 'delete'])->name('categories.delete')->middleware('auth');

Route::resource('posts', PostsController::class);

Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');

Route::post('trashed-posts/{post}/untrash', [PostsController::class, 'untrash'])->name('posts.untrash')->middleware('auth');