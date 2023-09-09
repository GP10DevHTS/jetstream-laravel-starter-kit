<?php

use App\Http\Controllers\AssignRolesController;
use App\Http\Controllers\GivePermissionsToRoleController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use Illuminate\Support\Facades\Route;


// roles & permissions

// give permissions
Route::prefix('/roles-permissions')->group(function () {
    Route::controller(GivePermissionsToRoleController::class)->group(function () {
        Route::get('/roles/give-permissions', 'create')->name('roles.give-permissions');
        Route::post('/roles/give-permissions', 'store')->name('roles.store-permissions');
        Route::get('/roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('/roles/{role}', 'update')->name('roles.update-permissions');
    });

    // roles
    Route::controller(RolesController::class)->group(function () {
        Route::get('/roles',  'index')->name('roles.index');
        Route::get('/roles/create',  'create')->name('roles.create');
        Route::post('/roles',  'store')->name('roles.store');
        Route::get('/roles/{role}',  'show')->name('roles.show');
    });

    // permissions
    Route::get('/permissions', [PermissionsController::class, 'index'])
        ->name('permissions.index');

    // assign role to user
    Route::controller(AssignRolesController::class)->group(function () {
        Route::get('/assign-roles', 'index')->name('assign-roles.index');
        Route::get('/assign-roles/create', 'create')->name('assign-roles.create');
        Route::post('/assign-roles', 'store')->name('assign-roles.store');
        Route::get('/assign-roles/{user}', 'show')->name('assing-roles.show');
        Route::get('/assign-roles/{user}/edit', 'edit')->name('assing-roles.edit');
        Route::put('/assign-roles/{user}', 'update')->name('assign-roles.update');
    });
});
