<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SystemSettingController;

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

Route::get('/', function() {
    return view('index');
});


// Route::get('/dashboard', function() {
//     return view('dashboard');
// })->middleware('verified');


Route::get('/events', [EventController::class, 'index']);
Route::post('/events', [EventController::class, 'getevents']);
Route::prefix('event')->group(function() {
    Route::get('/create', [EventController::class, 'create']);
    Route::post('/create', [EventController::class, 'store']);
    Route::get('/{event:slug}/edit', [EventController::class, 'edit']);
    Route::put('/{event:slug}/edit', [EventController::class, 'update']);
    Route::get('/{event:slug}', [EventController::class, 'show']);
    Route::delete('/{event:slug}', [EventController::class, 'destroy']);
});

Route::get('/users/search', [UserController::class, 'search']);
Route::prefix('user')->group(function() {
    Route::post('{user:id}/verify', [UserController::class, 'verify']);
});


Route::prefix('dashboard')->group(function() {
    Route::get('/', function() { return view('dashboard.index'); });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{user:id}', [UserController::class, 'show']);

    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/groups/create', [GroupController::class, 'store']);
    Route::get('/group/{group:name}', [GroupController::class, 'show']);

    Route::get('/system-settings', [SystemSettingController::class, 'index']);
    Route::post('/system-settings', [SystemSettingController::class, 'update']);
})->middleware('verified');