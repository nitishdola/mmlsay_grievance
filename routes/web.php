<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sha\Master\GrievanceCategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sha\DashboardController;
use App\Http\Controllers\Isa\IsaDashboardController;
use App\Http\Controllers\Frontend\UserGrievancesController;
use App\Http\Controllers\Sha\ShaGrievancesController;
use App\Http\Controllers\Isa\IsaGrievancesController;
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
    Route::get('/success', [UserGrievancesController::class, 'success'])->name('success');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('sha/home', [DashboardController::class, 'dashboard'])->name('sha.home')->middleware('is_sha');
Route::get('isa/home', [IsaDashboardController::class, 'dashboard'])->name('isa.home')->middleware('is_isa');


Route::group(['prefix'=>'sha','as'=>'sha.', 'middleware' => 'is_sha'], function(){
    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::group(['prefix' => 'grievance-category', 'as' => 'grievance_category.'], function () {
            Route::get('/create', [GrievanceCategoriesController::class, 'create'])->name('create');
            Route::post('/save', [GrievanceCategoriesController::class, 'save'])->name('save');
            Route::get('/', [GrievanceCategoriesController::class, 'index'])->name('index');
            Route::get('/edit/{id}', [GrievanceCategoriesController::class, 'edit'])->name('edit');
            Route::get('/delete/{id}', [GrievanceCategoriesController::class, 'delete'])->name('delete');
            Route::post('/update/{id}', [GrievanceCategoriesController::class, 'update'])->name('update');
        });
    });

    Route::group(['prefix' => 'grievance', 'as' => 'grievance.'], function () {
        Route::get('/create', [ShaGrievancesController::class, 'create'])->name('create');
        Route::post('/save', [ShaGrievancesController::class, 'save'])->name('save');
        Route::get('/', [ShaGrievancesController::class, 'index'])->name('index');
        Route::get('/view/{id}', [ShaGrievancesController::class, 'view'])->name('view');
        Route::post('/process/{id}', [ShaGrievancesController::class, 'process'])->name('process');
        Route::get('/out-of-tat-grievances', [ShaGrievancesController::class, 'outOfTatGrievances'])->name('out_of_tat');
        Route::get('/resolved-grievances', [ShaGrievancesController::class, 'resolvedGrievances'])->name('resolved');
        Route::get('/pending-at-isa', [ShaGrievancesController::class, 'pendingAtIsaGrievances'])->name('isa_pending');
        Route::get('/pending-at-sha', [ShaGrievancesController::class, 'pendingAtShaGrievances'])->name('sha_pending');
        Route::get('/unresolved', [ShaGrievancesController::class, 'unresolvedGrievances'])->name('unresolved');
        Route::get('/discarded', [ShaGrievancesController::class, 'discardedGrievances'])->name('discarded');
        
    });

});


Route::group(['prefix'=>'isa','as'=>'isa.', 'middleware' => 'is_isa'], function(){
    Route::group(['prefix' => 'grievance', 'as' => 'grievance.'], function () {
        Route::get('/view-all', [IsaGrievancesController::class, 'index'])->name('index');
        Route::get('/view-all-isa-resolved', [IsaGrievancesController::class, 'isaResolved'])->name('isa_resolved');
        Route::get('/view/{id}', [IsaGrievancesController::class, 'view'])->name('view');
        Route::post('/process/{id}', [IsaGrievancesController::class, 'process'])->name('process');
    });

});

