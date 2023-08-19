<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::controller(AdminController::class)->group(function () {
    Route::prefix("/admin")->group(function () {
        Route::middleware("auth")->group(function () {
            Route::get("/", "index")->name("admin.index");
            Route::get("/articles", "articles")->name("admin.articles");
            Route::get("/articles/trash", "articlesTrash")->name("articles.trash");
            Route::get("/categories", "categories")->name("admin.categories");
            Route::get("/tags", "tags")->name("admin.tags");
        });
    });
});

Route::controller(ArticleController::class)->group(function () {
    Route::name("articles.")->group(function () {
        Route::get("/", "index")->name("index");

        Route::prefix("/articles")->group(function () {
            Route::middleware("auth")->group(function () {
                Route::get("/create", "create")->name("create");
                Route::post("/store", "store")->name("store");
                Route::get("/{article}/edit", "edit")->name("edit");
                Route::put("/{article}", "update")->name("update");
                Route::post("/{article}", "delete")->name("delete");
                Route::post("/{article}/restore", "restore")->withTrashed()->name("restore");
                Route::delete("/{article}", "destroy")->withTrashed()->name("destroy");
            });

            Route::get("{article}", "show")->name("show");
        });
    });
});

Route::controller(CategoryController::class)->group(function () {
    Route::name("categories.")->group(function () {
        Route::prefix("/categories")->group(function () {
            Route::middleware("auth")->group(function () {
                Route::get("/create", "create")->name("create");
                Route::post("/store", "store")->name("store");
                Route::delete("/{category}", "destroy")->name("destroy");
            });
            Route::get("{category}", "show")->name("show");
        });
    });
});

Route::controller(CommentController::class)->group(function () {
    Route::name("comments.")->group(function () {
        Route::prefix("/comments")->group(function () {
            Route::post("/store", "store")->name("store");
            Route::get("/reply/{comment}", "reply")->name("reply");
        });
    });
});

Route::controller(TagController::class)->group(function () {
    Route::name("tags.")->group(function () {
        Route::prefix("/tags")->group(function () {
            Route::middleware("auth")->group(function () {
                Route::post("/store", "store")->name("store");
                Route::delete("/{tag}", "destroy")->name("destroy");
            });
            Route::get("/", "index")->name("index");
            Route::get("{tag}", "show")->name("show");
        });
    });
});
