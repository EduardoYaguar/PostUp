<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FriendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    if(Auth::check()){
        return redirect()->route('dashboard');
    }
    return view('landing');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/profile/{user}', [PageController::class, 'profile'])->name('profile.show');

    Route::put('/friends/{user}', [FriendController::class, 'update'])->name('friends.update');
    Route::post('/friends/{user}', [FriendController::class, 'store'])->name('friends.store');
    Route::delete('/friends/{user}', [FriendController::class, 'destroy'])->name('friends.destroy');

    Route::get('/status', [PageController::class, 'status'])->name('status');
});

require __DIR__.'/auth.php';
