<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RateCriteriaController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TypeUserController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('adminhome');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::resource('/universities',UniversityController::class);
Route::resource('/users',UserController::class);
Route::resource('/criteria',RateCriteriaController::class);
Route::resource('/type_user',TypeUserController::class);
// Route::get('/create_universities', [UniversityController::class,'create']);
// Route::post('/store_universities', [UniversityController::class, 'store'])->name('add_universities');

