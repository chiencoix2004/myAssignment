<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\client\homeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('post-login', [AuthenticationController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::get('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('post-register', [AuthenticationController::class, 'postRegister'])->name('postRegister');
// Route::get('profile', [AuthenticationController::class, 'profile'])->name('profile');

Route::group([
    'prefix' => 'admin', 'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function () {

    Route::get('/', [categoryController::class, 'listCategorys'])->name('listCategorys');

    Route::group(['prefix' => 'categorys', 'as' => 'categorys.'], function () {
        Route::get('/', [categoryController::class, 'listCategorys'])->name('listCategorys');

        Route::get('add-categorys', [categoryController::class, 'addCategorys'])->name('addCategorys');
        Route::post('add-categorys', [categoryController::class, 'addPostCategorys'])->name('addPostCategorys');

        // Route::get('delete-categorys/{categoryId}', [categoryController::class, 'deleteCategorys'])->name('deleteCategorys');
        Route::delete('delete-categorys', [categoryController::class, 'deleteCategorys'])->name('deleteCategorys');

        Route::get('update-categorys/{categoryId}', [categoryController::class, 'updateCategorys'])->name('updateCategorys');
        Route::post('update-categorys', [categoryController::class, 'updatePostCategorys'])->name('updatePostCategorys');
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [productController::class, 'listProducts'])->name('listProducts');

        Route::get('detail-product/{idProduct}', [productController::class, 'detailProduct'])->name('detailProduct');

        Route::get('add-product', [productController::class, 'addProduct'])->name('addProduct');
        Route::post('add-products', [productController::class, 'addPostProduct'])->name('addPostProduct');

        Route::delete('delete-products', [productController::class, 'deleteProduct'])->name('deleteProduct');

        Route::get('update-products/{idProduct}', [productController::class, 'updateProduct'])->name('updateProduct');
        Route::patch('update-products/{idProduct}', [productController::class, 'updatePostProduct'])->name('updatePostProduct');
    });
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [usersController::class, 'listUsers'])->name('listUsers');

        Route::get('add-users', [usersController::class, 'addUsers'])->name('addUsers');
        Route::post('add-users', [usersController::class, 'addPostUsers'])->name('addPostUsers');

        // Route::get('delete-users/{userId}', [usersController::class, 'deleteUser'])->name('deleteUser');
        Route::delete('delete-users', [usersController::class, 'deleteUser'])->name('deleteUser');

        Route::get('update-users/{userId}', [usersController::class, 'updateUser'])->name('updateUser');
        Route::post('update-users', [usersController::class, 'updatePostUser'])->name('updatePostUser');

        Route::get('detail-users/{userId}', [usersController::class, 'detailUser'])->name('detailUser');
    });

    // Route::group(['prefix'=>'products','as'=>'products.'],function(){
    //     Route::get('list-products',[productController::class,'listCategorys'])->name('listCategorys');

    //     Route::get('add-products',[productController::class,'addCategorys'])->name('addCategorys');
    // Route::post('add-categorys',[categoryController::class,'addPostCategorys'])->name('addPostCategorys');

    // Route::get('delete-categorys/{userId}',[categoryController::class,'deleteCategorys'])->name('deleteCategorys');

    // Route::get('update-categorys/{userId}',[categoryController::class,'updateCategorys'])->name('updateCategorys');
    // Route::post('update-categorys',[categoryController::class,'updatePostCategorys'])->name('updatePostCategorys');
    // });

});
Route::get('/', [homeController::class, 'homeClient'])->name('homeClient');
Route::get('listProduct', [homeController::class, 'listProduct'])->name('listProduct');
Route::get('categoryProduct/{categoryId}', [homeController::class, 'categoryProduct'])->name('categoryProduct');
Route::get('searchProduct', [homeController::class, 'searchProduct'])->name('searchProduct');
Route::get('profile', [homeController::class, 'profile'])->name('profile');