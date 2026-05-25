<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PageController;

Route::get('/{author_id?}', [PostController::class, 'index'])
    ->where('author_id', '[0-9]+')
    ->name('posts.index');
Route::resource('posts', PostController::class)->except(['index']);
Route::get('/support', [PageController::class, 'support'])->name('page.support');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/support', [PageController::class, 'support'])->name('page.support');
    Route::resource('authors', AuthorController::class);
    Route::resource('posts', PostController::class)->except(['index']);
});