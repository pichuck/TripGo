<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('Index');
});

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
});

Route::get('/berita-update', function () {
    return Inertia::render('News');
});

Route::get('/contact-us', function () {
    return Inertia::render('Contact');
});

Route::get('/tour/{region}', function ($region) {
    return Inertia::render('Detailed/Tour', [
        'region' => ucwords(str_replace('-', ' ', $region))
    ]);
});


Route::get('/maps', function () {
    return Inertia::render('Maps/Maps'); 
})->name('maps'); 
;

Route::get('/Dashboard', function () {
    return Inertia::render('Dashboard/DashboardIndex'); 
})->name('dashboard'); 
;

Route::get('/detail-wisata', function () {
    return Inertia::render('HalamanDetailWisata'); 
})->name('detail-wisata'); 

Route::get('/detail-update', function () {
    return Inertia::render('HalamanDetailUpdate'); 
})->name('detail-update'); 


Route::get('/hello', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';