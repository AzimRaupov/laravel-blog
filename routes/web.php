<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/category',\App\Http\Controllers\CategoryController::class);

Route::resource('/post',\App\Http\Controllers\PostController::class);
Route::resource('/comment',\App\Http\Controllers\CommentController::class);

Route::post('/like',[\App\Http\Controllers\LikeController::class,'add'])->name('like.add');
Route::delete('/like',[\App\Http\Controllers\LikeController::class,'offlike'])->name('like.off');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
