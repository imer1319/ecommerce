<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::resource('users', UserController::class);
    Route::get('datatableUser', [UserController::class, 'dataTable'])->name('user.dataTable');

    Route::resource('tags', TagController::class);
    Route::get('datatableTag', [TagController::class, 'dataTable'])->name('tag.dataTable');

    Route::resource('categories', CategoryController::class);
    Route::get('datatableCategory', [CategoryController::class, 'dataTable'])->name('category.dataTable');
    Route::post('categories/media', [CategoryController::class, 'storeMedia'])->name('categories.storeMedia');

    Route::resource('products', ProductController::class);
    Route::get('datatableProduct', [ProductController::class, 'dataTable'])->name('product.dataTable');
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');

    Route::resource('roles', RoleController::class);
    Route::get('datatableRole', [RoleController::class, 'dataTable'])->name('role.dataTable');

    Route::get('password', [PasswordController::class, 'edit'])->name('password.edit')
        ->middleware('permission:user_management_access');
    Route::post('password', [PasswordController::class, 'update'])->name('password.updated');
    Route::post('profile', [PasswordController::class, 'updateProfile'])->name('password.updateProfile');
    Route::post('profile/destroy', [PasswordController::class, 'destroy'])->name('password.destroyProfile');

});
