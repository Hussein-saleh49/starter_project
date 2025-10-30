<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(ThemeController::class)->group(function () {
    Route::get('/index', "index")->name("theme.index");
    Route::get('/category/{name}', "category")->name("theme.category");
    Route::get('/contact', "contact")->name("theme.contact");

});
Route::post("/subscribe", [SubscriberController::class, "subscribe"])->name("subscribe");
Route::post("/contact", [ContactController::class, "contact"])->name("contact");

Route::resource("blogs", BlogController::class)->except("index");
Route::post("/comment", [CommentController::class, "store"])->name("comments.store");
