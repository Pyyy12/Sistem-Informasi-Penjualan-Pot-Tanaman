<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCatalogController;

Route::get('/', [ProductCatalogController::class, 'index'])->name('catalog.index');
Route::get('/pot/{slug}', [ProductCatalogController::class, 'show'])->name('catalog.show');