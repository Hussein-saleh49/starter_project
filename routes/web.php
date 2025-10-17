<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(ThemeController::class)->group(function(){
    Route::get('/index',"index")->name("theme.index");
    Route::get('/category',"category")->name("theme.category");
    Route::get('/contact',"contact")->name("theme.contact");
    Route::get('/single-blog',"singleblog")->name("theme.single_blog");
    Route::get('/sign-up',"register")->name("theme.register");
    Route::get('/login',"login")->name("theme.login");
});
