<?php

use App\Http\Controllers\PaketController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PaketController::class, 'index'])->name('rental.index');
Route::get('/tambah', [PaketController::class, 'create'])->name('rental.create');
Route::post('/tambah', [PaketController::class, 'store'])->name('rental.store');
Route::get('/ubah/{id}', [PaketController::class, 'edit'])->name('rental.edit');
Route::put('/ubah/{id}', [PaketController::class, 'update'])->name('rental.update');
Route::delete('/hapus/{id}', [PaketController::class, 'destroy'])->name('rental.destroy');

