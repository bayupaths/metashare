<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\AdminController;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{slug}', [App\Http\Controllers\CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/testimony', [App\Http\Controllers\TestimonyController::class, 'index'])->name('testimony');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\PofileController::class, 'index'])->name('profile');

Route::prefix('super-admin')
    ->middleware(['check_admin:SUPER_ADMIN'])
    ->namespace('SuperAdmin')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'index'])->name('super-admin-dashboard');
        Route::prefix('master-data')->group(function () {
            Route::resource('invitation', '\App\Http\Controllers\SuperAdmin\InvitationModelController');
            Route::get('invitation/{categories}', [App\Http\Controllers\SuperAdmin\InvitationModelController::class, 'index'])->name('category-invitation');
            Route::resource('admin',  '\App\Http\Controllers\SuperAdmin\AdminController');
            Route::resource('customer',  '\App\Http\Controllers\SuperAdmin\CustomerController');
        });
        Route::resource('transaction', '\App\Http\Controllers\SuperAdmin\TransactionController');
    });

Route::prefix('admin')
    ->middleware(['check_admin:ADMIN'])
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');
        Route::prefix('master-data')->group(function () {
            Route::get('invitation', [App\Http\Controllers\Admin\DataInvitationModelController::class, 'index'])->name('admin-invitation-index');
            Route::get('invitation/{categories}', [App\Http\Controllers\Admin\DataInvitationModelController::class, 'index'])->name('data-category-invitation');
            Route::get('admin', [App\Http\Controllers\Admin\DataAdminController::class, 'index'])->name('data-admin-index');
            Route::get('admin/{id}', [App\Http\Controllers\Admin\DataAdminController::class, 'show'])->name('data-admin-show');
        });
    });

Route::get('login-admin', [\App\Http\Controllers\Auth\LoginAdminController::class, 'index'])->name('admin-login');
Route::post('login-admin/process', [\App\Http\Controllers\Auth\LoginAdminController::class, 'process'])->name('admin-login-process');
Route::get('login-admin/logout', [\App\Http\Controllers\Auth\LoginAdminController::class, 'logout'])->name('admin-logout');

Auth::routes();

Route::get('/test_sunset', function() {
    return view('invitations.special.sunset-shades.demo');
});
