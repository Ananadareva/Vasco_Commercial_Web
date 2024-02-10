<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/vasco.com/home', function () {
    return view('loginView');
});


Route::get('/vasco.com/login', [AuthController::class, 'login'])->name('login');
Route::post('/vasco.com/login', [AuthController::class, 'authenticating']);
Route::get('/vasco.com/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/vasco.com/register', [AuthController::class, 'register'])->name('register');
Route::post('/vasco.com/register', [AuthController::class, 'register'])->name('submitRegister');


//Admin
Route::get('/vasco.com/admin/catalog', [AdminController::class, 'showCatalogAdmin'])->name('catalogAdmin.show');
Route::get('/vasco.com/admin/product/{idProduct}', [AdminController::class, 'detailProductAdmin'])->name('productAdmin.show');


Route::get('/vasco.com/admin/insertProduct', [AdminController::class, 'insertProductAdmin'])->name('productAdmin.insert');
Route::post('/vasco.com/admin/storeProduct', [AdminController::class, 'storeProductAdmin'])->name('productAdmin.store');
Route::get('/vasco.com/admin/product/{idProduct}/destroy', [AdminController::class, 'destroyProductAdmin'])->name('productAdmin.destroy');
Route::get('/vasco.com/admin/product/{idProduct}/edit', [AdminController::class, 'editProductAdmin'])->name('productAdmin.edit');
Route::put('/vasco.com/admin/product/{idProduct}/update', [AdminController::class, 'updateProductAdmin'])->name('productAdmin.update');

Route::get('/vasco.com/admin/{idProduct}/insertVariant', [AdminController::class, 'insertVariantAdmin'])->name('variantAdmin.insert');
Route::post('/vasco.com/admin/{idProduct}/storeVariant', [AdminController::class, 'storeVariantAdmin'])->name('variantAdmin.store');
Route::get('/vasco.com/admin/{idProduct}/{idVariant}/destroyVariant', [AdminController::class, 'destroyVariantAdmin'])->name('variantAdmin.destroy');
Route::get('/vasco.com/admin/{idProduct}/{idVariant}/editVariant', [AdminController::class, 'editVariantAdmin'])->name('variantAdmin.edit');
Route::put('/vasco.com/admin/{idProduct}/{idVariant}/updateVariant', [AdminController::class, 'updateVariantAdmin'])->name('variantAdmin.update');

Route::get('/vasco.com/admin/{idProduct}/{idVariants}/insertAvailableSize', [AdminController::class, 'insertAvailableSizeAdmin'])->name('availableSizeAdmin.insert');
Route::post('/vasco.com/admin/{idProduct}/{idVariants}/storeAvailableSize', [AdminController::class, 'storeAvailableSizeAdmin'])->name('availableSizeAdmin.store');
Route::get('/vasco.com/admin/{idProduct}/{idVariant}/{idAvailableSize}/destroyAvailableSize', [AdminController::class, 'destroyAvailableSizeAdmin'])->name('availableSizeAdmin.destroy');
Route::get('/vasco.com/admin/{idProduct}/{idVariant}/{idAvailableSize}/editAvailableSize', [AdminController::class, 'editAvailableSizeAdmin'])->name('availableSizeAdmin.edit');
Route::put('/vasco.com/admin/{idProduct}/{idVariant}/{idAvailableSize}/updateAvailableSize', [AdminController::class, 'updateAvailableSizeAdmin'])->name('availableSizeAdmin.update');



/* Route::get('/vasco.com/admin/product/insert', [AdminController::class, 'insertProductAdmin'])->name('productAdmin.insert');
Route::post('/vasco.com/admin/product/store', [AdminController::class, 'storeProductAdmin'])->name('productAdmin.store'); */

/* 
Route::get('/vasco.com/admin/product/{idProduct}/edit', [AdminController::class, 'editProductAdmin'])->name('productAdmin.edit');
Route::post('/vasco.com/admin/product/{idProduct}/edit', [AdminController::class, 'updateProductAdmin'])->name('productAdmin.update');
Route::get('/vasco.com/admin/product/{idProduct}/delete', [AdminController::class, 'deleteProductAdmin'])->name('productAdmin.delete');
Route::get('/vasco.com/admin/product/{idProduct}/destroy', [AdminController::class, 'destroyProductAdmin'])->name('productAdmin.destroy'); */




//Customer


Route::get('vasco.com', [CustomerController::class, 'landing'])->name('landing');
Route::get('vasco.com/orderHistory/{idLogin}', [CustomerController::class, 'orderHistory'])->name('orderHistory');

Route::get('/vasco.com/catalog', [CustomerController::class, 'showCatalog'])->name('catalog.show');
Route::get('/vasco.com/latest', [CustomerController::class, 'showNewArrival'])->name('newArrivalView.show');
Route::get('/vasco.com/bestSeller', [CustomerController::class, 'showBestSeller'])->name('bestSeller.show');

Route::get('/vasco.com/category/{idCategory}', [CustomerController::class, 'showProductsPerCategory'])->name('category.show');
Route::get('/vasco.com/product/{idProduct}', [CustomerController::class, 'showProduct'])->name('product.show');

//order

Route::get('/vasco.com/product/{idProduct}/order', [OrderController::class, 'order'])->name('product.order');
Route::post('/vasco.com/product/{idProduct}/{idVariant}/{idAvailableSize}/process', [OrderController::class, 'process'])->name('order.process');
Route::get('/vasco.com/confirm/{idTransaction}/{idDelivery}', [OrderController::class, 'confirm'])->name('order.confirm');
Route::get('/vasco.com/updateData/{idTransaction}/{idDelivery}', [OrderController::class, 'updateData'])->name('order.updateData');

//ongkir
Route::get('getCitiesprovince/{idProvince}', [OrderController::class, 'getCities'])->name('getCities');
Route::get('getCouriers/{idCity}/{idCourier}/{productsWeight}', [OrderController::class, 'getCouriers'])->name('getCouriers');

