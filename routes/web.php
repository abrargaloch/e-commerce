<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Vonage\Meetings\Room;

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

Route::controller(AdminController::class)->group(function(){

    Route::match(['get', 'post'], '/login', 'login')->name('admin.login');
    Route::get('/logout', 'logout')->name('admin.logout');

    //admin middleware for group of routes for dashboard
    Route::middleware('admin')->group(function() {
       Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
       Route::get('/update-password', 'updatePassword')->name('admin.update-password');

    });

});
