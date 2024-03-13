<?php

declare(strict_types=1);

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
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

Route::get("/", [DashboardController::class, "index"])->name("dashboard");
Route::get("/search", [DashboardController::class, "search"])->name("dashboard.search");
Route::get("/profile", [ProfileController::class, "index"]);

Route::group(["prefix" => "ideas", "as" => "ideas.", "middleware" => ["auth"]], function (): void {
    Route::get("/{idea}", [IdeaController::class, "show"])->name("show")->withoutMiddleware(["auth"]);

    Route::post("/", [IdeaController::class, "store"])->name("store");
    Route::get("/{idea}/edit", [IdeaController::class, "edit"])->name("edit");
    Route::put("/{idea}", [IdeaController::class, "update"])->name("update");
    Route::delete("/{idea}", [IdeaController::class, "destroy"])->name("destroy");
    Route::post("/{idea}/comments", [CommentController::class, "store"])->name("comments.store");
});

Route::group(["prefix" => "comments", "as" => "comments.", "middleware" => ["auth"]], function (): void {
    Route::get("/{comment}", [CommentController::class, "show"])->name("show")->withoutMiddleware(["auth"]);
    Route::get("/{comment}/edit", [CommentController::class, "edit"])->name("edit");
    Route::put("/{comment}", [CommentController::class, "update"])->name("update");
    Route::delete("/{comment}", [CommentController::class, "destroy"])->name("destroy");
});
