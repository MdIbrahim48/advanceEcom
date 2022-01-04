<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ========= Admin Route =============
Route::group(['prefix'=>'admin','middleware'=>['auth','admin'],'namespace'=>'Admin'],function () {
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/profile',[AdminController::class,'profile'])->name('profile');
    Route::post('/update-data',[AdminController::class,'updateData'])->name('update-data');
    Route::get('/admin-image',[AdminController::class,'adminImage'])->name('admin-image');
    Route::post('/admin/update/image',[AdminController::class,'adminUpdateImage'])->name('admin-update-image');
    Route::get('/admin/password',[AdminController::class,'adminPassword'])->name('admin-password');
    Route::post('/admin/update/password',[AdminController::class,'adminUpdatePassword'])->name('admin-update-password');

    // brand Controller
    Route::get('/all/brands',[BrandController::class,'index'])->name('brands');
    Route::post('/brand/store',[BrandController::class,'brandStore'])->name('brand-store');
    Route::get('/brand-edit/{id}',[BrandController::class,'brandEdit'])->name('brand-edit');
    Route::post('/update-brand/{id}',[BrandController::class,'brandUpdate'])->name('update-brand');
    Route::get('/delete-brand/{id}',[BrandController::class,'brandDelete'])->name('brand-delete');


     // Categories Controller
     Route::get('/all/categories',[CategoryController::class,'index'])->name('categories');
     Route::post('/category-store',[CategoryController::class,'categoryStore'])->name('category-store');
     Route::get('/category-edit/{id}',[CategoryController::class,'categoryEdit'])->name('category-edit');
     Route::post('/update-category/{id}',[CategoryController::class,'categoryUpdate'])->name('update-category');
     Route::get('/delete-category/{id}',[CategoryController::class,'categoryDelete'])->name('category-delete');

     // sub-category
     Route::get('/all/sub-category',[CategoryController::class,'subCategoryIndex'])->name('sub-category');
     Route::post('/sub-category-store',[CategoryController::class,'subCategoryStore'])->name('subcategory-store');
     Route::get('/sub-category-edit/{id}',[CategoryController::class,'subCategoryEdit'])->name('sub-category-edit');
     Route::post('/update-sub-category/{id}',[CategoryController::class,'subCategoryUpdate'])->name('update-subcategory');
     Route::get('/delete-sub-category/{id}',[CategoryController::class,'subCategoryDelete'])->name('sub-category-delete');

    //  sub-sub-category
     Route::get('/sub-sub-category',[CategoryController::class,'subSubIndex'])->name('sub-sub-category');
     Route::get('/subcategory/ajax/{catId}',[CategoryController::class,'getSubCat']);
     Route::post('/sub-sub-category/store',[CategoryController::class,'subSubStore'])->name('sub-subcategory-store');
     Route::get('/sub-sub-category-edit/{subsubId}',[CategoryController::class,'subSubEdit'])->name('sub-sub-category-edit');
     Route::post('/sub-sub-category-update/{subsubId}',[CategoryController::class,'subSubUpdate'])->name('update-sub-subcategory');
     Route::get('/sub-sub-category-delete/{subsubId}',[CategoryController::class,'subSubDelete'])->name('sub-sub-category-delete');

    //  Add Product
    Route::get('/add-product',[ProductController::class,'addProduct'])->name('add-product');
    Route::get('/sub-subcategory/ajax/{subcatId}',[ProductController::class,'getSubSubCat']);
    Route::post('/store-product',[ProductController::class,'storeProduct'])->name('store-product');
    Route::get('/all-product',[ProductController::class,'index'])->name('manage-product');


});

// ========= User Route =============
Route::group(['prefix'=>'user','middleware'=>['auth','user'],'namespace'=>'User'],function () {
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('/update/data',[UserController::class,'updateData'])->name('update.profile');
    Route::get('/image',[UserController::class,'imagePage'])->name('user-image');
    Route::post('/update-image',[UserController::class,'updateImage'])->name('update-image');
    Route::get('/user-password',[UserController::class,'userPassword'])->name('user-password');
    Route::post('/update-password',[UserController::class,'updatePassword'])->name('update-password');
});

// ========= Frontend Route =============
Route::get('/',[IndexController::class,'index'])->name('frontend.home');

