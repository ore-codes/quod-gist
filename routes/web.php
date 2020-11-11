<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\ServerMemberController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/join/{id}', [ServerMemberController::class, 'join'])
        ->name('server_members.join');

    Route::post('/servers/{id}/members', [ServerMemberController::class, 'add'])
        ->name('server_members.add');

    Route::delete('/servers/{serverId}/members/{memberId?}', [ServerMemberController::class, 'remove'])
        ->name('server_members.remove');

    Route::get('/servers', [ServerController::class, 'index'])
        ->name('servers.index');
    Route::get('/servers/{id}', [ServerController::class, 'show'])
        ->name('servers.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/servers/{server}/messages', [MessageController::class, 'index']);
Route::post('/servers/{server}/messages', [MessageController::class, 'store']);
Route::put('/messages/{id}', [MessageController::class, 'update']);
Route::delete('/messages/{id}', [MessageController::class, 'destroy']);
