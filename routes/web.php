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
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');

Route::get('/tickets/create', [App\Http\Controllers\TicketController::class, 'create'])->name('tickets.create');

Route::post('/tickets', [App\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');

Route::get('/tickets/{id}', [App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');

Route::get('/tickets/{id}/edit', [App\Http\Controllers\TicketController::class, 'edit'])->name('tickets.edit');

Route::put('/tickets/{id}', [App\Http\Controllers\TicketController::class, 'update'])->name('tickets.update');

Route::delete('/tickets/{id}', [App\Http\Controllers\TicketController::class, 'destroy'])->name('tickets.destroy');
