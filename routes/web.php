<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class, [
        'names' => [
            'index'     => 'users',
            'store'     => 'users.store',
            'edit'      => 'users.edit',
            'show'      => 'users.show',
            'update'    => 'users.update',
            'destroy'   => 'users.destroy'
        ]
    ]);
    Route::resource('roles', RoleController::class, [
        'names' => [
            'index'     => 'roles',
            'store'     => 'roles.store',
            'edit'      => 'roles.edit',
            'show'      => 'roles.show',
            'update'    => 'roles.update',
            'destroy'   => 'roles.destroy'
        ]
    ]);
    Route::resource('permissions', PermissionController::class, [
        'names' => [
            'index'     => 'permissions',
            'store'     => 'permissions.store',
            'edit'      => 'permissions.edit',
            'show'      => 'permissions.show',
            'update'    => 'permissions.update',
            'destroy'   => 'permissions.destroy'
        ]
    ]);
    Route::resource('posts', PostController::class, [
        'names' => [
            'index'     => 'posts',
            'store'     => 'posts.store',
            'edit'      => 'posts.edit',
            'show'      => 'posts.show',
            'update'    => 'posts.update',
            'destroy'   => 'posts.destroy'
        ]
    ]);
});