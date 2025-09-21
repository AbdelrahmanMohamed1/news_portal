<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewLetterController;
use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group(
    [
        'as' => 'frontend.'
    ],
    function () {
        Route::post('/newsletter/subscribe', [NewLetterController::class, 'subscribe'])->name('newsletter.subscribe');
        Route::get('/', [HomeController::class, 'index'])->name('index');
        Route::get('/post/{slug}', [PostController::class, 'show'])->name('show');
        Route::get('/post/id/{id}', [PostController::class, 'showById'])->name('showById');
        Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');
        Route::get('/post/show-more-comments/{slug}', [PostController::class, 'showMoreComments'])->name('show-more-comments');
        Route::post('/post/add-comment', [PostController::class, 'addComment'])->name('add-comment');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
