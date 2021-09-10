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

/*Route::get('/', function () {
    return "hello";
});*/

     // testing url
Route::get('/test', [App\Http\Controllers\TestController::class, 'Test'])->name('test');




Route::get('/', [App\Http\Controllers\HomeController::class, 'Index'])->name('indexnot');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'Index'])->name('index');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'CreateCart'])->name('user.addtocart');

Route::post('/contact', [App\Http\Controllers\HomeController::class, 'Contact'])->name('contact');

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

    Route::get('/user', [App\Http\Controllers\gurudwara\UserController::class, 'Show'])->name('gurudwara.user');
    Route::get('/useredit/{id?}', [App\Http\Controllers\gurudwara\UserController::class, 'ShowEdit'])->name('gurudwara.useredit');
    Route::get('/services', [App\Http\Controllers\gurudwara\ServiceController::class, 'Show'])->name('gurudwara.services');
    Route::get('/servicesedit/{id?}', [App\Http\Controllers\gurudwara\ServiceController::class, 'ShowEdit'])->name('gurudwara.servicesedit');

    Route::get('/newbron', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'ShowNewBron'])->name('gurudwara.newbron');

    Route::get('/marriage', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'Show'])->name('gurudwara.marriage');
    Route::get('/marriageadd', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'ShowMarriage'])->name('gurudwara.marriageadd');
    Route::post('/marriageadd', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'ShowMarriageConfirm'])->name('gurudwara.marriageConfirm');
    Route::get('/marriageedit/{id?}', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'ShowEdit'])->name('gurudwara.marriageedit');
    Route::post('/marriageedit', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'Edit'])->name('gurudwara.marriageeditConfirm');
    
    Route::get('/marriagereport/{id?}', [App\Http\Controllers\gurudwara\GenerateReportController::class, 'Report'])->name('gurudwara.marriagereport');


    Route::get('/addbirth', [App\Http\Controllers\gurudwara\BirthReportController::class, 'ShowAdd'])->name('gurudwara.addbirth');
    Route::post('/addbirth', [App\Http\Controllers\gurudwara\BirthReportController::class, 'Add'])->name('gurudwara.addbirthConfirm');
    Route::get('/adddeath', [App\Http\Controllers\gurudwara\DeathReportController::class, 'ShowAdd'])->name('gurudwara.adddeath');
    Route::post('/adddeath', [App\Http\Controllers\gurudwara\DeathReportController::class, 'Add'])->name('gurudwara.adddeathConfirm');


});
            // all user route
Route::prefix('user')->group(function () {
    Route::get('/register', [App\Http\Controllers\user\RegisterController::class, 'Show'])->name('user.register');
    Route::post('/register', [App\Http\Controllers\user\RegisterController::class, 'Register1'])->name('user.register');
    // Route::get('/otp', [App\Http\Controllers\user\RegisterController::class, 'OTPShow'])->name('user.otp');
    Route::post('/confirmregister', [App\Http\Controllers\user\RegisterController::class, 'ConfirmRegister1'])->name('user.confirmregister');
    
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

    // admin.gurdwaralogin
    Route::get('/admingurdwaralogin', [App\Http\Controllers\admin\GurdwaraController::class, 'GurdwaraLogin'])->name('admin.gurdwaralogin');

});