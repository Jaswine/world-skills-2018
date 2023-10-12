<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// http://127.0.0.1/api/projects
Route::post('create-module', [ModuleController::class, 'storeApi']);
Route::get('projects', [ProjectController::class, 'show_all_projects']);