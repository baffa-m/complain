<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplaintsController;
use App\Models\Complaints;

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
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', [ComplaintsController::class, 'home'])->name('home');

    Route::resource('complaints', ComplaintsController::class);
    Route::get('user/staff', [UsersController::class, 'createStaff'])->name('user.staff');
    Route::post('user/staff', [UsersController::class, 'postStaff'])->name('add.staff');
    Route::get('user/student', [UsersController::class, 'createStudent'])->name('user.student');
    Route::post('user/staff', [UsersController::class, 'postStudent'])->name('add.student');

});
