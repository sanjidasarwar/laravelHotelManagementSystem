<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
 
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.user.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');
});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
