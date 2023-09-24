<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileOfAdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard')->with([
        'sex_options' => ['男', '女', 'その他'],
        'grade_options' => ['中学1年生', '中学2年生', '中学3年生', '高校1年生', '高校2年生', '高校3年生', '既卒生'],
        'goal_options' => ['受験', '学校フォロー', '内部進学']
        ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function () {
        return view('admin.dashboard')->with([
            'sex_options' => ['男', '女', 'その他'],
            'institution_options' => ['大学', '大学院', '社会人'],
            'grade_options' => ['大学1年生', '大学2年生', '大学3年生', '大学4年生', '修士1年生', '修士2年生', '社会人'],
            'teach_experience_options' => ['1年未満', '1年以上2年未満', '2年以上3年未満', '3年以上4年未満', '4年以上5年未満', '5年以上'],
            ]);
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [ProfileOfAdminController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileOfAdminController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileOfAdminController::class, 'destroy'])->name('profile.destroy');
    });
    
    require __DIR__.'/admin.php';
});
