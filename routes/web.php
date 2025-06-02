<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ArticleController;

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


Route::get('/maps', function () {
    return Inertia::render('Maps/Maps');
})->name('maps');;

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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/DashboardIndex');
})->middleware(['auth', 'role:administrator'])->name('dashboard');

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:superadministrator'])->group(function () {
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
});

Route::get('articles', [ArticleController::class, 'index']);
Route::get('articles/{id}', [ArticleController::class, 'show']);
Route::post('articles', [ArticleController::class, 'store']);
Route::put('articles/{id}', [ArticleController::class, 'update']);
Route::delete('articles/{id}', [ArticleController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Socialite Routes 
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);

require __DIR__ . '/auth.php';
