<?php

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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Rutas para la entidad "events"
Route::get('/events', [App\Http\Controllers\EventController::class, 'index'])->name('events.index');
Route::get('/events/create',  [App\Http\Controllers\EventController::class, 'create'])->name('events.create')->middleware(['auth', 'checkrole']);
Route::post('/events/join',  [App\Http\Controllers\EventController::class, 'join'])->name('events.join');
Route::post('/events/{event}/unjoin', [App\Http\Controllers\EventController::class, 'unJoin'])->name('events.unjoin');
Route::post('/events',  [App\Http\Controllers\EventController::class, 'store'])->name('events.store');
Route::get('/events/{id}',  [App\Http\Controllers\EventController::class, 'show'])->name('events.show');
Route::get('/events/{id}/edit',  [App\Http\Controllers\EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}',  [App\Http\Controllers\EventController::class, 'update'])->name('events.update');