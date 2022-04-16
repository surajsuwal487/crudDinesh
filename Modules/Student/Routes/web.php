<?php
use Modules\Student\Http\Controllers\StudentController;
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

Route::prefix('student')->name('student.')->group(function() {
    route::get('/', [StudentController::class,'index'])->name('index');
    route::get('add',[StudentController::class,'add'])->name('add');
    route::post('store',[StudentController::class,'store'])->name('store');
    route::get('edit/{id}',[StudentController::class,'edit'])->name('edit');
    route::post('update',[StudentController::class,'update'])->name('update');
    route::post('delete',[StudentController::class,'delete'])->name('delete');

});
