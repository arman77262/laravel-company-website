<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultipicController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('services')->get();
    $images = DB::table('multipics')->get();
    return view('home', compact('brands','abouts','services','images'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //elequent orm
    //$user = User::all();

   /*  $user = DB::table('users')->get(); */
    return view('admin.index');
})->name('dashboard');

Route::get('category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('store/category', [CategoryController::class, 'StoreCat'])->name('store.category');
Route::get('category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('category/update/{id}', [CategoryController::class, 'UpdateCat']);

Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('category/restore/{id}', [CategoryController::class, 'restore']);
Route::get('category/pdelete/{id}', [CategoryController::class, 'pDelete']);

//brand Route start form hear
Route::get('brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('store/Brand',[BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('brand/edit/{id}',[BrandController::class,'Edit']);
Route::post('update/brand/{id}',[BrandController::class, 'UpdateBrand']);
Route::get('brand/delete/{id}',[BrandController::class, 'DeleteBrand']);

//multi images
Route::get('multi/images',[BrandController::class, 'MultiPic'])->name('multi.images');
Route::post('store/images', [BrandController::class, 'StoreImages'])->name('store.images');
Route::get('multipic/delete/{id}', [BrandController::class, 'MultipicDelete']);
Route::get('user/logout', [BrandController::class, 'logout'])->name('user.logout');

//All Home Route
Route::get('/home/slider', [HomeController::class, 'homeSlider'])->name('home.slider');
Route::get('add/slider', [HomeController::class, 'addSlider'])->name('add.slider');
Route::post('add/slider', [HomeController::class, 'storeSlider'])->name('store.slider');
Route::get('slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('update/slider/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

//All Home About Route
Route::get('home/about',[AboutController::class, 'index'])->name('home.about');
Route::get('add/home/about', [AboutController::class, 'addAbout'])->name('add.about');
Route::post('store/home/about', [AboutController::class, 'storeAbout'])->name('store.about');
Route::get('about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('update/about/{id}', [AboutController::class, 'UpdateAbout']);
Route::get('about/delete/{id}', [AboutController::class, 'DeleteAbout']);

//All Serivces Route
Route::get('home/services', [ServiceController::class, 'index'])->name('home.service');
Route::get('add/services', [ServiceController::class, 'addService'])->name('add.services');
Route::post('store/services', [ServiceController::class, 'storeService'])->name('store.service');
Route::get('service/edit/{id}', [ServiceController::class, 'EditService']);
Route::post('update/service/{id}', [ServiceController::class, 'UpdateService']);
Route::get('service/delete/{id}', [ServiceController::class, 'DeleteService']);

//portfolio pages route
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');

//Admin Contact
Route::get('contact', [ContactController::class, 'AdminContact'])->name('contact');
Route::get('add/contact', [ContactController::class, 'CreateContact'])->name('add.contact');
Route::post('store/contact', [ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('contact/edit/{id}', [ContactController::class, 'EditContact']);
Route::post('update/contact/{id}', [ContactController::class, 'UpdateContact']);
Route::get('contact/delete/{id}', [ContactController::class, 'DeleteContact']);
Route::get('message/delete/{id}', [ContactController::class, 'DeleteMessage']);
Route::get('contact/message', [ContactController::class, 'Message'])->name('contactmessage');

//forntend Contact View
Route::get('Home/Contact', [ContactController::class, 'HomeContact'])->name('homecontact');
Route::post('contact/Message', [ContactController::class, 'ContactMessage'])->name('contact.message');

//admin user profile
Route::get('user/password', [ChangePass::class, 'CPassword'])->name('change.password');
Route::post('update/password', [ChangePass::class, 'UpdatePassword'])->name('password.update');

//update profile option
Route::get('update/profile', [ChangePass::class, 'ProfileUpdate'])->name('profile.update');
