<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\Resource;

Route::get('/', [AccesoController::class, 'bienvenido'])->name('bienvenido');
Route::get('/invitado', [Resource::class, 'indexInvitado'])->name('productos.invitado');

Route::get('/login', [AccesoController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AccesoController::class, 'login'])->name('login.post');

Route::get('/productos', [Resource::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [Resource::class, 'create'])->name('productos.create');
Route::post('/productos', [Resource::class, 'store'])->name('productos.store');
Route::get('/productos/{codigo}/editar', [Resource::class, 'edit'])->name('productos.edit');
Route::put('/productos/{codigo}', [Resource::class, 'update'])->name('productos.update');
Route::delete('/productos/{codigo}', [Resource::class, 'destroy'])->name('productos.destroy');