<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('courses', API\CoursesController::class);
Route::apiResource('students', API\StudentsController::class);
Route::apiResource('categories', API\CategoryContoller::class);
Route::apiResource('certificates', API\CertificatesController::class);
Route::delete('courses/student/{id}', 'API\CoursesController@deleteStudent');
Route::post('certificates/update/{id}', 'API\CertificatesController@update');
Route::post('certificates/store', 'API\CertificatesController@store');
