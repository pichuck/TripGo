<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\SocialiteController;

Route::get('/', function () {
    return inertia('Index');
})->name('home');

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

Route::get('/TripBuilder', function () {
    return Inertia::render('Ai/SearchDestinasi'); 
})->name('SearchDestinasi');


Route::get('/maps', function () {
    return Inertia::render('Maps/Maps');
})->name('maps');;

Route::get('/detail-wisata', function () {
    return Inertia::render('HalamanDetailWisata');
})->name('detail-wisata');

Route::get('/detail-update', function () {
    return Inertia::render('HalamanDetailUpdate');
})->name('detail-update');

Route::post('/get-recommendations', [RecommendationController::class, 'getRecommendations']);


Route::get('/kontribusi/tambah-wisata
', function () {
    return Inertia::render('TambahWisata');
})->name('TambahWisata');

route::get('/TripBuilder_preview', function () {
    return Inertia::render('Ai/RekomendasiAi');
})->name('RekomendasiAi');

Route::get('/hello', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/DashboardIndex');
})->middleware('auth', 'role:admin')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Socialite Routes 
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

require __DIR__ . '/auth.php';