<?php

use App\Http\Controllers\TopPageController;
use App\Http\Controllers\Admin\TopPageOfAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileOfAdminController;
use App\Http\Controllers\MatchingController;
use App\Http\Controllers\Admin\MatchingOfAdminController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [TopPageController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/show_schedule/{event}', [TopPageController::class, 'show'])->name('show_schedule');
    
    Route::get('/matching', [MatchingController::class, 'index'])->name('matching');
    Route::get('/matching/apply/{admin}', [MatchingController::class, 'apply'])->name('apply');
    Route::get('/matching/cancel/{admin}', [MatchingController::class, 'cancel'])->name('cancel');
    Route::post('/matching/apply/{admin}', [MatchingController::class, 'apply'])->name('apply');
    Route::post('/matching/cancel/{admin}', [MatchingController::class, 'cancel'])->name('cancel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['auth:admin', 'verified'])->group(function () {
        Route::get('/dashboard', [TopPageOfAdminController::class, 'index'])->name('dashboard');
        
        Route::get('/dashboard/add_schedule', [TopPageOfAdminController::class, 'add'])->name('add_schedule');
        Route::post('/dashboard/store_schedule', [TopPageOfAdminController::class, 'store'])->name('store_schedule');
        
        Route::get('/dashboard/edit_schedule/{event}', [TopPageOfAdminController::class, 'edit'])->name('edit_schedule');
        Route::put('/dashboard/update_schedule/{event}', [TopPageOfAdminController::class, 'update'])->name('update_schedule');
        Route::delete('/dashboard/delete_schedule/{event}', [TopPageOfAdminController::class,'delete'])->name('delete_schedule');

        
        Route::get('/matching', [MatchingOfAdminController::class, 'index'])->name('matching');
        Route::post('/matching/accept/{matching}', [MatchingOfAdminController::class, 'accept'])->name('matching.accept');
        Route::post('/matching/reject/{matching}', [MatchingOfAdminController::class, 'reject'])->name('matching.reject');
        
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/admin.php';
});
