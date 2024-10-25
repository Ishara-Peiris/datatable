<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/department', [ DepartmentController::class, 'index'])->name('department.insert');
Route::get('/department/table', [ DepartmentController::class, 'getDetails'])->name('department.table');

Route::post('/dept/store', [DepartmentController::class, 'store'])->name('Department.store');
Route::get('/{id}/department/update', [ DepartmentController::class, 'update'])->name('department.update');
Route::get('/{id}/department/delete', [ DepartmentController::class, 'delete'])->name('department.delete');
Route::put('/{id}/dept/edit', [DepartmentController::class, 'edit'])->name('DepartmentController.edit');

require __DIR__.'/auth.php';

Route::get('/department/index4', [ DepartmentController::class, 'index4'])->name('department.insert4');

