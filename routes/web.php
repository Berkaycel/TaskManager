<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
})->name('index');


Route::prefix('tasks')->name('tasks.')->group(function(){
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/getAll', [TaskController::class, 'listDevelopers'])->name('getAll');
});