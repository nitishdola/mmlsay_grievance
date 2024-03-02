<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\GrievanceCategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\UserGrievancesController;
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

Route::get('/', function () {
    return view('layouts.frontend.home');
});

Route::group(['prefix' => 'grievance', 'as' => 'grievance.'], function () {
    Route::get('/raise', [UserGrievancesController::class, 'raiseGrievance'])->name('raise');
    Route::post('/save', [UserGrievancesController::class, 'saveGrievance'])->name('save');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('sha/home', [HomeController::class, 'shaHome'])->name('sha.home')->middleware('is_sha');
Route::get('isa/home', [HomeController::class, 'isaHome'])->name('isa.home')->middleware('is_isa');


Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'is_sha'], function(){
    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::group(['prefix' => 'grievance-category', 'as' => 'grievance_category.'], function () {
            Route::get('/create', [GrievanceCategoriesController::class, 'create'])->name('create');
            Route::post('/save', [GrievanceCategoriesController::class, 'save'])->name('save');
            Route::get('/', [GrievanceCategoriesController::class, 'index'])->name('index');
        });
    });
});

