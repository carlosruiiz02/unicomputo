<?php

use App\Http\Controllers\Resource;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [Resource::class, 'apiIndex']);