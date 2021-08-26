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

// Route::get('/', function () {
//     return view('welcome');
// });

     // testing url
Route::get('/test', [App\Http\Controllers\TestController::class, 'Test'])->name('test');




Route::get('/', [App\Http\Controllers\HomeController::class, 'Index'])->name('indexnot');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'Index'])->name('index');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'CreateCart'])->name('user.addtocart');

                // all gurudwara route
Route::prefix('gurudwara')->group(function () {
    Route::get('/login', [App\Http\Controllers\gurudwara\LoginController::class, 'Show'])->name('gurudwara.login');
    Route::post('/login', [App\Http\Controllers\gurudwara\LoginController::class, 'Login'])->name('gurudwara.loginconfirm');
    Route::get('/register', [App\Http\Controllers\gurudwara\RegisterController::class, 'Show'])->name('gurudwara.register');
    Route::post('/register', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register'])->name('gurudwara.registerconfirm');

    Route::get('/home', [App\Http\Controllers\gurudwara\HomeController::class, 'Show'])->name('gurudwara.home');
    Route::post('/homeAjax', [App\Http\Controllers\gurudwara\HomeController::class, 'Homeajax'])->name('gurudwara.homeAjax');
    Route::get('/logout', [App\Http\Controllers\gurudwara\LoginController::class, 'Logout'])->name('gurudwara.logout');

    Route::get('/upload', [App\Http\Controllers\gurudwara\HomeController::class, 'ShowUpload'])->name('gurudwara.upload');
    Route::post('/uploadconfirm', [App\Http\Controllers\gurudwara\HomeController::class, 'Upload'])->name('gurudwara.uploadConfirm');

    Route::get('/member', [App\Http\Controllers\gurudwara\MemberController::class, 'Show'])->name('gurudwara.member');
    Route::get('/addmember', [App\Http\Controllers\gurudwara\MemberController::class, 'ShowAdd'])->name('gurudwara.addmember');
    Route::post('/addmember', [App\Http\Controllers\gurudwara\MemberController::class, 'Add'])->name('gurudwara.addmemberConfirm');
    Route::get('/editmember/{id?}', [App\Http\Controllers\gurudwara\MemberController::class, 'ShowEdit'])->name('gurudwara.editmember');
    Route::post('/editmember', [App\Http\Controllers\gurudwara\MemberController::class, 'Edit'])->name('gurudwara.editmemberConfirm');

});
            // all user route
Route::prefix('user')->group(function () {
    Route::get('/register', [App\Http\Controllers\user\RegisterController::class, 'Show'])->name('user.register');
    Route::post('/registerconfirmwithajax', [App\Http\Controllers\user\RegisterController::class, 'Register'])->name('user.registerconfirm');
    Route::post('/registerconfirmwithoutajax', [App\Http\Controllers\user\RegisterController::class, 'Register'])->name('user.registerconfirmwithout');

    Route::get('/servicesregister', [App\Http\Controllers\user\ServicesRegisterController::class, 'Show'])->name('user.servicesregister');
    Route::post('/registerAjax', [App\Http\Controllers\user\ServicesRegisterController::class, 'RegisterAjax'])->name('user.registerAjax');
    Route::post('/registerservicesConfirm', [App\Http\Controllers\user\ServicesRegisterController::class, 'Register'])->name('user.registerservicesConfirm');
    Route::post('/registerservicesfamilyConfirm', [App\Http\Controllers\user\ServicesRegisterController::class, 'RegisterFamily'])->name('user.registerservicesfamilyConfirm');

});


//    all admin route here
Route::prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\admin\LoginController::class, 'Show'])->name('admin.loginwithout');
    Route::get('/login', [App\Http\Controllers\admin\LoginController::class, 'Show'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\admin\LoginController::class, 'Login'])->name('admin.loginConfirm');
    Route::get('/logout', [App\Http\Controllers\admin\LoginController::class, 'Logout'])->name('admin.logout');

    Route::get('/home', [App\Http\Controllers\admin\HomeController::class, 'Show'])->name('admin.home');
    Route::get('/gurudwara', [App\Http\Controllers\admin\GurudwaraController::class, 'Show'])->name('admin.gurudwara');
    Route::get('/gurudwaradit/{id?}', [App\Http\Controllers\admin\GurudwaraController::class, 'Edit'])->name('admin.gurudwaraedit');
    Route::post('/gurudwaraditconfirm', [App\Http\Controllers\admin\GurudwaraController::class, 'EditConfirm'])->name('admin.gurudwaraeditconfirm');

    Route::post('/gurudwaraAccept', [App\Http\Controllers\admin\GurudwaraController::class, 'Acept'])->name('admin.gurudwaraAccept');
    Route::post('/gurudwaraReject', [App\Http\Controllers\admin\GurudwaraController::class, 'Reject'])->name('admin.gurudwaraReject');
    
    Route::get('/user', [App\Http\Controllers\admin\UserController::class, 'Show'])->name('admin.user');
    Route::get('/useredit/{id?}', [App\Http\Controllers\admin\UserController::class, 'Edit'])->name('admin.useredit');
    Route::post('/usereditconfirm', [App\Http\Controllers\admin\UserController::class, 'EditConfirm'])->name('admin.usereditconfirm');

    Route::post('/userAccept', [App\Http\Controllers\admin\UserController::class, 'Acept'])->name('admin.userAccept');
    Route::post('/userReject', [App\Http\Controllers\admin\UserController::class, 'Reject'])->name('admin.userReject');

    Route::get('/services', [App\Http\Controllers\admin\ServicesController::class, 'Show'])->name('admin.services');
    Route::get('/servicesedit/{id?}', [App\Http\Controllers\admin\ServicesController::class, 'Edit'])->name('admin.servicesedit');
    Route::post('/serviceseditconfirm', [App\Http\Controllers\admin\ServicesController::class, 'EditConfirm'])->name('admin.serviceseditconfirm');

});