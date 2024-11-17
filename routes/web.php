<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', function () {
    // dd(Auth::id());
    return view('dashboard',[
        'users' => \App\Models\User::where('id', '!=',Auth::id())->get()
    ]);
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


    Route::get('/chat/{user:name}', \App\Livewire\Chat::class)->name('chat');

require __DIR__.'/auth.php';
