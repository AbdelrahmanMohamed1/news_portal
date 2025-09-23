<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewLetterController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SearchController;
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
        Route::post('/post/add-comment', [PostController::class, 'addComment'])->name('add-comment');
        Route::get('/category/{slug}', [CategoryController::class, 'index'])->name('category');
        Route::get('/post/show-more-comments/{slug}', [PostController::class, 'showMoreComments'])->name('show-more-comments');
        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
        Route::match(['get','post'],'search',[SearchController::class,'__invoke'])->name('search');
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
