<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminSignUpController;
use App\Http\Controllers\AssignRolesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryExportController;
use App\Http\Controllers\DeletedCategoriesController;
use App\Http\Controllers\DeletedResultOptionsController;
use App\Http\Controllers\DeletedSpacemenController;
use App\Http\Controllers\DeletedTestServiceController;
use App\Http\Controllers\GivePermissionsToRoleController;
use App\Http\Controllers\Laboratory\TestOrdersController;
use App\Http\Controllers\LabServicesController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ResultOptionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SampleResultsCotroller;
use App\Http\Controllers\ServiceCategoriesController;
use App\Http\Controllers\SpacemensController;
use App\Http\Controllers\SubmitTestRequestsController;
// use App\Http\Controllers\TestResultscontroller;
use App\Http\Controllers\TestResultsController;
use App\Http\Controllers\WaitingListsController;

Route::redirect('/', 'login');

// admin signup
Route::get('/restricted-admin-signup', [AdminSignUpController::class, 'create'])->name('admin-signup.create');
Route::post('/restricted-admin-signup', [AdminSignUpController::class, 'store'])->name('admin-singup.store');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('result-options', [ResultOptionsController::class, 'index'])->name('result-options.index');
    Route::get('/service-categories', [ServiceCategoriesController::class, 'index'])->name('service-categories.index');
    Route::get('/lab-services', [LabServicesController::class, 'index'])->name('lab-services.index');
    Route::get('/spacemens', [SpacemensController::class, 'index'])->name('spacemens.index');

    Route::controller(AccountsController::class)->group(function () {
        Route::get('/accountings', 'index')->name('accountings.index');
        Route::get('/accountings/{patient}', 'show')->name('accountings.show');
        Route::get('/accountings/{patient}/print-receipt', 'printReceipt')->name('accountings.print-receipt');
    });

    // resource controller [index, create, store, show, edit, update, delete]
    Route::resources([
        'patients' => PatientsController::class,
        'requests' => SubmitTestRequestsController::class,
        'laboratory/test-orders' => TestOrdersController::class,
        'laboratory/test-results' => TestResultscontroller::class,
        // 'accountings' => AccountsController::class,
    ]);

    // roles & permissions
    // give permissions
    Route::controller(GivePermissionsToRoleController::class)->group(function () {
        Route::get('/roles-permissions/roles/give-permissions', 'create')->name('roles.give-permissions');
        Route::post('/roles-permissions/roles/give-permissions', 'store')->name('roles.store-permissions');
        Route::get('/roles-permissions/roles/{role}/edit', 'edit')->name('roles.edit');
        Route::put('/roles-permissions/roles/{role}', 'update')->name('roles.update-permissions');
    });

    // roles
    Route::controller(RolesController::class)->group(function () {
        Route::get('/roles-permissions/roles',  'index')->name('roles.index');
        Route::get('/roles-permissions/roles/create',  'create')->name('roles.create');
        Route::post('/roles-permissions/roles',  'store')->name('roles.store');
        Route::get('/roles-permissions/roles/{role}',  'show')->name('roles.show');
    });

    // permissions
    Route::get('/roles-permissions/permissions', [PermissionsController::class, 'index'])
        ->name('permissions.index');

    // assign role to user
    Route::controller(AssignRolesController::class)->group(function () {
        Route::get('/roles-permissions/assign-roles', 'index')->name('assign-roles.index');
        Route::get('/roles-permissions/assign-roles/create', 'create')->name('assign-roles.create');
        Route::post('/roles-permissions/assign-roles', 'store')->name('assign-roles.store');
        Route::get('/roles-permissions/assign-roles/{user}', 'show')->name('assing-roles.show');
        Route::get('/roles-permissions/assign-roles/{user}/edit', 'edit')->name('assing-roles.edit');
        Route::put('/roles-permissions/assign-roles/{user}', 'update')->name('assign-roles.update');
    });

    // restore routes
    Route::get('/deleted-categories', [DeletedCategoriesController::class, 'index'])
        ->name('deleted-categories.index');

    Route::get('/deleted-test-services', [DeletedTestServiceController::class, 'index'])
        ->name('deleted-test-service.index');

    Route::get('/deleted-spacemen', [DeletedSpacemenController::class, 'index'])
        ->name('deleted-spacemen.index');

    Route::get('/deleted-result-options', [DeletedResultOptionsController::class, 'index'])
        ->name('deleted-result-options.index');

    // exports
    Route::get('/export-categories', [CategoryExportController::class, 'index'])->name('export-categories.index');
});
