<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

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

Route::redirect("/", "/articles");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/articles")->group(function () {
    Route::controller(ArticleController::class)->group(function () {
        Route::get("/", "index")->name("articles.index");
        Route::get("{article}", "show")->name("articles.show");
    });
});

Route::prefix("/categories")->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        // Route::get("/", "index")->name("categories.index");
        Route::get("{category}", "show")->name("categories.show");
    });
});

Route::prefix("/comments")->group(function () {
    Route::controller(CommentController::class)->group(function () {
        Route::post("/", "store")->name("comments.store");
        Route::get("/reply/{comment}", "reply")->name("comments.reply");
    });
});

Route::prefix("/tags")->group(function () {
    Route::controller(TagController::class)->group(function () {
        Route::get("/", "index");
        Route::get("{tag}", "show");
    });
});
