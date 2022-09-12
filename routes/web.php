<?php

use App\Http\Controllers\AdminController\AdminController;
use App\Http\Controllers\bouquet\bouquetController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\lesson\lessonController;
use App\Http\Controllers\teacher\teacheController;
use App\Http\Controllers\section\sectionController;
use App\Http\Controllers\classroom\classroomController;
use App\Http\Controllers\Package\PackageController;
use App\Http\Controllers\platformdata\platformdataController;
use App\Http\Controllers\thelesson\thelessonController;
use App\Mail\TestMail;

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
    return view('admin.auth.login');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin' ])->name('admin.dashboard');

require __DIR__.'/adminauth.php';


        Route::resource('Grades', GradeController::class);
         Route::resource('Classrooms', classroomController::class);
         Route::post('delete_all', [classroomController::class , 'delete_all'])->name('delete_all');
        // Route::post('Filter_Classes', [ClassroomsClassroomController::class , 'Filter_Classes'])->name('Filter_Classes');


         Route::resource('Sections', sectionController::class);
         Route::get('/classes/{id}', [sectionController::class , 'getclasses'])->name('getclasses');


        // Route::view('add_parent' , 'livewire.show_Form')->name('add_parent');

         Route::resource('Teachers', teacheController::class);
         Route::resource('lesson', lessonController::class);
         Route::resource('bouquets', bouquetController::class);

        Route::resource('getusers', UserController::class);
        Route::resource('Package', PackageController::class);
        Route::resource('alladmin', AdminController::class);
        Route::resource('users', UserController::class);
        Route::resource('platformdata', platformdataController::class);

        // Route::get('getusers' , [Controller::class ,'getusers'])->name('getusers');
        // Route::put('getusers/{id}' , [Controller::class ,'update'])->name('getusersupdate');




