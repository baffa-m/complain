<?php

use App\Models\Message;
use App\Models\Complaints;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ComplaintsController;

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
    Route::get('{complaint}/chat', [MessageController::class, 'show'])->name('complaints.chat');
    Route::post('{complaint}/chat', [MessageController::class, 'store'])->name('complaints.chat.store');
    Route::get('complaints/{complaint}/completed', [ComplaintsController::class, 'markCompleted'])->name('completed');
    Route::resource('complaints', ComplaintsController::class);
    Route::get('user/staff', [UsersController::class, 'createStaff'])->name('user.staff');
    Route::post('user/staff', [UsersController::class, 'postStaff'])->name('add.staff');
    Route::get('user/student', [UsersController::class, 'createStudent'])->name('user.student');
    Route::post('user/student', [UsersController::class, 'postStudent'])->name('add.student');

});
