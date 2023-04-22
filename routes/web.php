<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Check;
use App\Http\Middleware\Task;

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
    return redirect('login');
});

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/admin', function () {
    return view('admin-lte.mainadmin');
});
Route::get('admin/dashboard', function () {
    return view('dashboard');
});

Route::prefix('admin')->group(function(){

    Route::get('user/add',[UserController::class,'adduser'])->name('add')->middleware('Admin','auth');
    Route::post('user/insertuser',[UserController::class,'store'])->name('insertuser')->middleware('Admin','auth');
    Route::get('user/list',[UserController::class,'index'])->name('list')->middleware('auth');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('edit')->middleware('Admin','auth');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('update')->middleware('Admin','auth');
    Route::post('user/delete/{id}',[UserController::class,'destroy'])->name('delete')->middleware('Admin','auth');

    Route::get('project/add',[ProjectController::class,'addproject'])->name('project/add')->middleware('auth','Check');
    Route::post('project/insertproject',[ProjectController::class,'store'])->name('insertproject')->middleware('auth','Check');
    Route::get('project/list',[ProjectController::class,'index'])->name('project/list')->middleware('auth');
    Route::get('project/edit/{id}',[ProjectController::class,'edit'])->name('project/edit')->middleware('auth','Check');
    Route::post('project/update/{id}',[ProjectController::class,'update'])->name('project/update')->middleware('auth','Check');
    Route::post('project/delete/{id}',[ProjectController::class,'destroy'])->name('project/delete')->middleware('auth','Check');

    Route::get('task/add',[TaskController::class,'addtask'])->name('task/add')->middleware('auth','Task');
    Route::post('task/inserttask',[TaskController::class,'store'])->name('inserttask')->middleware('auth','Task');
    Route::get('task/list',[TaskController::class,'index'])->name('task/list')->middleware('auth');
    Route::get('task/edit/{id}',[TaskController::class,'edit'])->name('task/edit')->middleware('auth','Task');
    Route::post('task/update/{id}',[TaskController::class,'update'])->name('task/update')->middleware('auth','Task');
    Route::post('task/delete/{id}',[TaskController::class,'destroy'])->name('task/delete')->middleware('auth','Task');
    Route::post('/task/add/fetch-employee',[TaskController::class,'fetchEmployee']);

     Route::post('/task/edit/{id}/fetch-employee',[TaskController::class,'fetchEmployee']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
