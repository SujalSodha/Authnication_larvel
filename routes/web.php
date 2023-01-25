<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CutomerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadController;

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

// customer table in all routes..  

Route::get("/",function(){
    return view("/layout/index");
});


Route::group(['prefix' => '/customer'],function(){
    Route::get("", [CutomerController::class, "index"]);
    Route::post("", [CutomerController::class, "store"]);
    Route::get("/delete/{id}",[CutomerController::class,"delete"])->name("customer.delete");
    Route::get("/force-delete/{id}",[CutomerController::class,"forceDelete"])->name("customer.force-delete");
    Route::get('/view', [CutomerController::class, "view"]);
    Route::get("/edit/{id}",[CutomerController::class,"edit"])->name("customer.edit");
    Route::post("/update/{id}",[CutomerController::class,"update"])->name("customer.update");
    Route::get('/trash', [CutomerController::class, "trash"]);
    Route::get("/restore/{id}",[CutomerController::class,"restore"])->name("customer.restore");
});

// collactive form in all routes for student 

Route::get("/student",[StudentController::class,"index"]);
Route::post("/student",[StudentController::class,"store"]);
Route::get("/studentView",[StudentController::class,"view"]);
Route::get("/student/delete/{id}",[StudentController::class,"delete"]);
Route::get("/student/edit/{id}",[StudentController::class,"edit"])->name("student.edit");
Route::post("/student/update/{id}",[StudentController::class,"update"])->name("student.update");

// -----------------------

// upload image
Route::get("/upload",function(){
    return view("upload");
});
Route::post("/upload",[UploadController::class,"upload"]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
