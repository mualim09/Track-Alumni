<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);

    // Events
    Route::get('events', [App\Http\Controllers\Admin\EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [App\Http\Controllers\Admin\EventController::class, 'create'])->name('events.create');
    Route::post('events', [App\Http\Controllers\Admin\EventController::class, 'store'])->name('events.store');
    Route::get('events/{id}', [App\Http\Controllers\Admin\EventController::class, 'show'])->name('events.show');
    Route::get('events/{id}/edit', [App\Http\Controllers\Admin\EventController::class, 'edit'])->name('events.edit');
    Route::post('events/{id}', [App\Http\Controllers\Admin\EventController::class, 'update'])->name('events.update');
    Route::get('events/{id}/delete', [App\Http\Controllers\Admin\EventController::class, 'destroy'])->name('events.destroy');

    // job 
    Route::get('jobs', [App\Http\Controllers\Admin\JobPostController::class, 'index'])->name('jobs.index');
    Route::get('jobs/create', [App\Http\Controllers\Admin\JobPostController::class, 'create'])->name('jobs.create');
    Route::post('jobs', [App\Http\Controllers\Admin\JobPostController::class, 'store'])->name('jobs.store');
    Route::get('jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'show'])->name('jobs.show');
    Route::get('jobs/{id}/edit', [App\Http\Controllers\Admin\JobPostController::class, 'edit'])->name('jobs.edit');
    Route::post('jobs/{id}', [App\Http\Controllers\Admin\JobPostController::class, 'update'])->name('jobs.update');
    Route::get('jobs/{id}/delete', [App\Http\Controllers\Admin\JobPostController::class, 'destroy'])->name('jobs.destroy');


});

Route::get('alumnies/create', [App\Http\Controllers\Admin\AlumniController::class, 'create'])->name('alumnies.create');
// Alumnies
Route::get('alumnies', [App\Http\Controllers\Admin\AlumniController::class, 'index'])->name('alumnies.index');
    
Route::post('alumnies', [App\Http\Controllers\Admin\AlumniController::class, 'store'])->name('alumnies.store');
Route::get('alumnies/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'show'])->name('alumnies.show');
Route::get('alumnies/{id}/edit', [App\Http\Controllers\Admin\AlumniController::class, 'edit'])->name('alumnies.edit');
Route::post('alumnies/{id}', [App\Http\Controllers\Admin\AlumniController::class, 'update'])->name('alumnies.update');
Route::get('alumnies/{id}/delete', [App\Http\Controllers\Admin\AlumniController::class, 'destroy'])->name('alumnies.destroy');


// Frontend 
Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('front.home');
Route::get('about', [App\Http\Controllers\FrontendController::class, 'about'])->name('front.about');
Route::get('front/events', [App\Http\Controllers\FrontendController::class, 'events'])->name('front.events');
Route::get('front/events/{id}', [App\Http\Controllers\FrontendController::class, 'eventshow'])->name('front.events.show');
Route::get('front/jobs/{id}', [App\Http\Controllers\FrontendController::class, 'jobshow'])->name('front.jobs.show');
Route::get('gallery', [App\Http\Controllers\FrontendController::class, 'gallery'])->name('front.gallery');
Route::get('contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('front.contact');
Route::get('front/opportunities', [App\Http\Controllers\FrontendController::class, 'jobs'])->name('front.jobs');
Route::get('front/alumni-list', [App\Http\Controllers\FrontendController::class, 'alumni_list'])->name('front.alumnies.index');
Route::get('front/alumni-list/{id}', [App\Http\Controllers\FrontendController::class, 'front_single_alumni'])->name('front.alumnies.show');