<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\BrandController;

use App\Http\Controllers\SliderController;

use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProfilUserController;

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

    $brandsClients = DB::table('brands')->get();

    return view('home', compact('brandsClients'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
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

Route::get('/sliders/all', [SliderController::class, 'index'])->name('sliders.all');

Route::get('/slider/create', [SliderController::class, 'create'])->name('slider.create');

Route::post('/slider/store', [SliderController::class, 'store'])->name('slider.store');

Route::get('/slider/SoftDelete/{id}' , [SliderController::class, 'SoftDelete']);

Route::get('/slider/restore/{id}', [SliderController::class, 'restore']);

Route::get('/slider/deleteP/{id}', [SliderController::class, 'deleteP']);

Route::get('/slider-edit/{id}', [SliderController::class, 'edit']);

Route::put('/slider/update/{id}', [SliderController::class, 'update']);


Route::get('/user-logout', [BrandController::class, 'logout'])->name('user.logout');

Route::get('/contact/view', [ContactController::class, 'getContact'])->name('contact.get');

Route::post('/contact/SendMessage', [ContactController::class, 'sendMessage'])->name('messageSend');

Route::get('/contact/admin', [ContactController::class, 'contactAdmin'])->name('admin.contact');


Route::get('/change/password', [ProfilUserController::class, 'changePassword'])->name('user.change.password');


Route::post('/change/password', [ProfilUserController::class, 'updatePassword'])->name('user.update.password');   

Route::get('/update/profil', [ProfilUserController::class, 'setProfile'])->name('user.update.profil');

Route::post('/update/profil', [ProfilUserController::class, 'updateProfil'])->name('update.profil');








