<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\BrandController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::get('/users', [UserController::class, 'getAllUsers'])->name('users');

Route::get('/reserve', function(){

    return 'Reserved Part';

})->middleware('age_number');


Route::get('/warning', function(){

    return view('warning');

})->name('warning');


Route::get('/categories/all', [CategoryController::class, 'allCat'])->name('cat.all');

Route::post('/categories/create', [CategoryController::class, 'addCat'])->name('cat.add');

Route::get('/categories/edit/{id}', [CategoryController::class, 'editCat'])->name('cat.edit');

Route::put('/categories/edit/{id}', [CategoryController::class, 'updateCat'])->name('cat.update');

Route::get('/categories/SoftDelete/{id}', [CategoryController::class, 'SoftDelete']);;

Route::get('/categories/Restore/{id}', [CategoryController::class, 'Restore']);

Route::get('/categories/DeletePermanent/{id}', [CategoryController::class, 'DeletePermanent']);



Route::get('/brands/all', [BrandController::class, 'index'])->name('brands.all');

Route::post('/brands/create', [BrandController::class, 'addBrand'])->name('brand.add');

Route::get('/brands/SoftDelete/{id}', [BrandController::class, 'SoftDelete']);

Route::get('/brands/restore/{id}', [BrandController::class, 'restore']);

Route::get('/brands/deleteP/{id}', [BrandController::class, 'deleteP']);

Route::get('/brands/edit/{id}', [BrandController::class, 'editBrand'])->name('brand.edit');


Route::put('/brands/edit/{id}', [BrandController::class, 'updateBrand'])->name('brand.update');






