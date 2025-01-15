<?php

use App\Http\Controllers\TaskController;
use App\Library\Services\TaskAssignmentService;
use App\Library\ThirdParty\TaskPlanner\TaskPlanner;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('tasks', TaskController::class);