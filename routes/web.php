<?php

use App\Http\Controllers\AssignRolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResultOptionsController;

Route::redirect('/', 'login');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('result-options', [ResultOptionsController::class, 'index'])->name('result-options.index');

    require __DIR__ . '/permissions.php';
});
