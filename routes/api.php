<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimpleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
 Route::middleware('auth:api')->group(function(){
    
 Route::post('logout',[LogoutController::class,'logout']);

});
Route::post('login', [LoginController::class, 'login']);
Route::post('register',[RegisterController::class,'register']);
Route::get('data',[SimpleController::class,'data']);
Route::get('test-db', function () {
    try {
        \DB::connection()->getPdo();
        return "Database connection is successful.";
    } catch (\Exception $e) {
        return "Could not connect to the database. Please check your configuration. Error: " . $e->getMessage();
    }
});

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('/student', [App\Http\Controllers\StudentController::class, 'store']);



