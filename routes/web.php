<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

// <<===== ADMIN ROUTE LIST ======>>
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/recycle', [AdminController::class, 'recycle'])->name('recycle');
Route::get('/logout', [AdminController::class, 'logout']);

Route::group(['prefix' => 'dashboard'], function(){

    // <<===== StaffController ROUTE LIST ======>>
    Route::group(['prefix' => 'user'], function()
    {
        Route::post('submit', [StaffController::class, 'insert'])->name('user_submit');
        Route::post('update/{id}', [StaffController::class, 'update'])->name('update');
        Route::get('add', [StaffController::class, 'add'])->name('adduser');
        Route::get('all', [StaffController::class, 'all'])->name('alluser');
        Route::get('view/{id}', [StaffController::class, 'view'])->name('viewuser');
        Route::get('edit/{id}', [StaffController::class, 'edit'])->name('edituser');
        Route::get('softdelete/{id}', [StaffController::class, 'softdelete'])->name('softdeleteuser');
        Route::get('restore', [StaffController::class, 'restoredata'])->name('restoreuser');
        Route::get('restore/{id}', [StaffController::class, 'restore'])->name('restore');
        Route::get('delete/{id}', [StaffController::class, 'delete'])->name('deleteuser');
    });

    // <<===== StudentController ROUTE LIST ======>>
    Route::resource('student', StudentController::class);

});
require __DIR__.'/auth.php';
