<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BreakingNewsController;

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

// Route::get('/', function () {
//     return view('layouts.home');
// });

Route::get('/storage-link', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder =  $_SERVER['DOCUMENT_ROOT'] . '/storage';

    if (!file_exists($linkFolder)) {
        symlink($targetFolder, $linkFolder);
        return "Storage link successfully created!";
    } else {
        return "Storage link already exists!";
    }
});

// Route::get('/search', [BeritaController::class, 'search'])->name('search');


Route::get('/', [Controller::class, 'home'])->name('home');
Route::get('/postingan/{slug}', [Controller::class, 'detail'])->name('posts.show');
Route::get('/tentang-kami', [Controller::class, 'about'])->name('about');
Route::get('/kategori-berita', [Controller::class, 'categories'])->name('categories');

Route::get('/auth', [UserController::class, 'auth'])->name('login');
Route::post('/auth/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/auth/logout', [UserController::class, 'logout'])->name('logout');

Route::get('login/google/slug', [GoogleController::class, 'setPostSlug'])->name('login.google.slug');
Route::get('login/google/redirect', [GoogleController::class, 'redirectToGoogle'])
    ->middleware(['guest'])
    ->name('login.google');
Route::get('login/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->middleware(['guest'])
    ->name('callback');


Route::get('/search', [Controller::class, 'search'])->name('search');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/metrics', [DashboardController::class, 'getPerformanceMetrics'])->name('dashboard.metrics');

    Route::prefix('manajemen-postingan')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/{post:slug}/update', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post:slug}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    Route::prefix('manajemen-kategori')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{slug}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{slug}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('breaking-news')->group(function () {
        Route::get('/', [BreakingNewsController::class, 'index'])->name('breaking-news.index');
        Route::post('/store', [BreakingNewsController::class, 'store'])->name('breaking-news.store');
        Route::delete('/{id}/delete', [BreakingNewsController::class, 'destroy'])->name('breaking-news.destroy');
    });


    Route::prefix('komentar')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comments.index');
        Route::post('/store', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('/{id}/delete', [CommentController::class, 'destroy'])->name('comments.destroy');
    });

    Route::prefix('manajemen-tentang-kami')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('about.index');
        Route::get('/creator', [AboutController::class, 'creator'])->name('about.creator');
        Route::put('/update/{id}', [AboutController::class, 'update'])->name('about.update');
    });

    Route::prefix('video')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('videos.index');
        Route::post('/store', [VideoController::class, 'store'])->name('videos.store');
        Route::delete('/{id}/delete', [VideoController::class, 'destroy'])->name('videos.destroy');
    });
});
