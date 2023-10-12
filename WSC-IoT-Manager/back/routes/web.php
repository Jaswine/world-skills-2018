<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

// Home page: xxx-m2.wsr.ru/
// Login page: xxx-m2.wsr.ru/login
Route::prefix('xxx-m2.wsr.ru')->group(function() {
   Route::get('login', [AuthController::class, 'login']);
   Route::get('register', [AuthController::class, 'register']);

   Route::get('user', [AuthController::class, 'user']);
   Route::post('user', [AuthController::class, 'generate_token']);

   Route::post('login', [AuthController::class, 'authenticate']);
   Route::post('register', [AuthController::class, 'addNewUser']);

   Route::get('logout', [AuthController::class, 'logout']);

   Route::get('', [ProjectController::class, 'projects']);

   Route::get('create-project', [ProjectController::class, 'create_projects']);
   Route::post('create-project', [ProjectController::class, 'store_project']);
   Route::get('projects/{id}/delete', [ProjectController::class, 'delete']);

   Route::get('modules', [ModuleController::class, 'modules']);
   Route::get('modules/{id}/delete', [ModuleController::class, 'delete']);

   Route::get('create-module', [ModuleController::class, 'create_module']);
   Route::post('create-module', [ModuleController::class, 'store']);

});
