<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Frontend\ListingController as FrontendListingController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Admin\ListingController as AdminListingsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendListingController::class, 'welcome'])->name('welcome');



Route::get('/all-listings', [FrontendListingController::class, 'index'])
    ->name('all-listings');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // auth()->user()->assignRole('admin');
    return view('dashboard');
})->name('dashboard');



Route::resource('listings', ListingController::class)->middleware('auth');


Route::middleware(['auth:sanctum', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('listings', AdminListingsController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{category}/add-sub', [CategoryController::class, 'add_sub'])->name('add_sub');
    Route::post('categories/{category}/add-sub', [CategoryController::class, 'add_sub_store'])->name('add_sub.store');

    Route::resource('subcategories', SubCategoryController::class);
    Route::resource('childcategories', ChildCategoryController::class);
    Route::resource('countries', CountryController::class);
    Route::get('countries/{country}/add-state', [CountryController::class, 'add_state'])->name('add_state');
    Route::post('countries/{country}/add-state', [CountryController::class, 'add_state_store'])->name('add_state.store');

    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);
});