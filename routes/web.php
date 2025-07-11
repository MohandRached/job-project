<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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


Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::post('/jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply')->middleware('auth');

Route::post('/jobs/{job}/favorite', [JobController::class, 'toggleFavorite'])
    ->name('jobs.favorite')
    ->middleware('auth');
Route::get('/favorites', [JobController::class, 'favorites'])->name('jobs.favorites')->middleware('auth');
Route::get('/applications', [JobController::class, 'applications'])->name('jobs.applications')->middleware('auth');
Route::get('/faqs', function () {
    $faqs = \App\Models\Faq::all();
    return view('jobs.faqs', compact('faqs'));
})->name('faqs');

Route::get('/policies', function () {
    $policies = \App\Models\Policy::all();
    return view('jobs.policies', compact('policies'));
})->name('policies');
