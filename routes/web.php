<?php

use Illuminate\Support\Facades\Route;
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
    if(Auth::check()){
        return redirect('/dashboard');
    }    
    return redirect('/admin-login');}
);
Route::get('/admin-login', function () { return view('admin/pages/login');});   
Route::post('/login', 'admin\AuthorizationController@login');
Route::group(['middleware' => ['web']], function() {
    
    Route::group(['middleware' => ['auth-admin']], function() {
        Route::get('/dashboard', 'admin\DashboardContoller@index');
        Route::get('/courses', 'admin\CoursesContoller@index');
        Route::get('/certificates', 'admin\CertificatesController@index');
        Route::get('/certificates/new', 'admin\CertificatesController@new');
        Route::get('/certificates/edit/{id}', 'admin\CertificatesController@edit');
        Route::post('/certificates/update/{id}', 'admin\CertificatesController@update');
        Route::get('/certificates/viewer', 'admin\CertificatesController@viewer');
        Route::get('/certificates/QrCode', 'admin\CertificatesController@QrCode');
        Route::post('/certificates/importStudents', 'admin\CertificatesController@importStudents');
        Route::post('/certificates/import-bg-certificates', 'admin\CertificatesController@importBgCertificate');
        Route::get('/certificates/send-email/{certificate_num}', 'admin\CertificatesController@sendEmail');
                Route::get('/certificates/send-email-all/{course_id}', 'admin\CertificatesController@sendEmailAll');
        Route::get('/certificates/download/{certificate_num}', 'admin\CertificatesController@download')->name('certificates-download');
        Route::get('/courses/{id}/students', 'admin\CoursesContoller@students');
        Route::get('/categories', 'admin\CategoriesContoller@index');
        Route::get('/logout', 'admin\AuthorizationController@logout');
    });
   Route::get('/certificates/download/{certificate_num}', 'admin\CertificatesController@download')->name('certificates-download');


});
    
