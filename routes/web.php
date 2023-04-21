<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PasswordController;

use App\Http\Controllers\User\UsersController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);


Route::middleware(['role:User', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');

    //Route::get('cart',);
});


Route::middleware(['role:Administrator'])->name('admin.')->group(function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    
    
    Route::post('categories/media', [CategoryController::class, 'storeMedia'])->name('categories.storeMedia');
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    
    Route::get('datatableUser', [UserController::class, 'dataTable'])->name('user.dataTable');
    Route::get('datatableRole', [RoleController::class, 'dataTable'])->name('role.dataTable');
    Route::get('datatableTag', [TagController::class, 'dataTable'])->name('tag.dataTable');
    Route::get('datatableCategory', [CategoryController::class, 'dataTable'])->name('category.dataTable');
    Route::get('datatableProduct', [ProductController::class, 'dataTable'])->name('product.dataTable');
    
    Route::get('password', [PasswordController::class, 'edit'])->name('password.edit')
        ->middleware('permission:user_management_access');
    Route::post('profile/destroy', [PasswordController::class, 'destroy'])->name('password.destroyProfile');
});


Route::post('password', [PasswordController::class, 'update'])->name('password.updated');
Route::post('profile', [PasswordController::class, 'updateProfile'])->name('password.updateProfile');
