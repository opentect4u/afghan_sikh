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
    // Route::post('/register', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register'])->name('gurudwara.registerconfirm');
    Route::post('/register', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register1'])->name('gurudwara.registerconfirm');
    Route::get('/otp', [App\Http\Controllers\gurudwara\RegisterController::class, 'OTPShow'])->name('gurudwara.otp');
    Route::post('/confirmregister', [App\Http\Controllers\gurudwara\RegisterController::class, 'ConfirmRegister1'])->name('gurudwara.confirmregister');
    Route::get('/registerstep2', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register2'])->name('gurudwara.registerstep2');
    Route::post('/registerstep2confirm', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register2Confirm'])->name('gurudwara.registerstep2confirm');
    Route::get('/registerstep3', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register3'])->name('gurudwara.registerstep3');
    Route::post('/registerstep3confirm', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register3Confirm'])->name('gurudwara.registerstep3confirm');
    Route::get('/registerstep4', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register4'])->name('gurudwara.registerstep4');
    Route::post('/registerstep4confirm', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register4Confirm'])->name('gurudwara.registerstep4confirm');
    Route::get('/registerstep5', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register5'])->name('gurudwara.registerstep5');
    Route::post('/registerstep5confirm', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register5Confirm'])->name('gurudwara.registerstep5confirm');
    Route::get('/registerstep6', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register6'])->name('gurudwara.registerstep6');
    Route::post('/registerstep6confirm', [App\Http\Controllers\gurudwara\RegisterController::class, 'Register6Confirm'])->name('gurudwara.registerstep6confirm');


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


    Route::get('/certificate', [App\Http\Controllers\gurudwara\CertificateController::class, 'Manage'])->name('gurudwara.certificate');
    Route::get('/certificateedit/{id?}', [App\Http\Controllers\gurudwara\CertificateController::class, 'ShowEdit'])->name('gurudwara.certificateedit');
    Route::post('/certificateeditconfirm', [App\Http\Controllers\gurudwara\CertificateController::class, 'Edit'])->name('gurudwara.certificateeditconfirm');


    Route::post('/editstage1', [App\Http\Controllers\gurudwara\HomeController::class, 'EditStage1'])->name('gurudwara.editstage1');
    Route::post('/editstage2', [App\Http\Controllers\gurudwara\HomeController::class, 'EditStage2'])->name('gurudwara.editstage2');
    Route::post('/editstage3', [App\Http\Controllers\gurudwara\HomeController::class, 'EditStage3'])->name('gurudwara.editstage3');
    Route::post('/editstage4', [App\Http\Controllers\gurudwara\HomeController::class, 'EditStage4'])->name('gurudwara.editstage4');
    Route::post('/chnagepass', [App\Http\Controllers\gurudwara\HomeController::class, 'ChangePass'])->name('gurudwara.chnagepass');


});
            // all user route
Route::prefix('user')->group(function () {
    Route::get('/login', [App\Http\Controllers\user\LoginController::class, 'Show'])->name('user.login');
    Route::post('/login', [App\Http\Controllers\user\LoginController::class, 'Login'])->name('user.loginconfirm');
    Route::get('/register', [App\Http\Controllers\user\RegisterController::class, 'Show'])->name('user.register');
    Route::post('/register', [App\Http\Controllers\user\RegisterController::class, 'Register1'])->name('user.register');
    Route::get('/otp', [App\Http\Controllers\user\RegisterController::class, 'OTPShow'])->name('user.otp');
    Route::post('/confirmregister', [App\Http\Controllers\user\RegisterController::class, 'ConfirmRegister1'])->name('user.confirmregister');
    Route::get('/registerstep2', [App\Http\Controllers\user\RegisterController::class, 'Register2'])->name('user.registerstep2');
    Route::post('/registerstep2confirm', [App\Http\Controllers\user\RegisterController::class, 'Register2Confirm'])->name('user.registerstep2confirm');
    Route::get('/registerstep3', [App\Http\Controllers\user\RegisterController::class, 'Register3'])->name('user.registerstep3');
    Route::post('/registerstep3confirm', [App\Http\Controllers\user\RegisterController::class, 'Register3Confirm'])->name('user.registerstep3confirm');
    Route::get('/registerstep4', [App\Http\Controllers\user\RegisterController::class, 'Register4'])->name('user.registerstep4');
    Route::post('/registerstep4confirm', [App\Http\Controllers\user\RegisterController::class, 'Register4Confirm'])->name('user.registerstep4confirm');
    Route::get('/registerstep5', [App\Http\Controllers\user\RegisterController::class, 'Register5'])->name('user.registerstep5');
    Route::post('/registerstep5confirm', [App\Http\Controllers\user\RegisterController::class, 'Register5Confirm'])->name('user.registerstep5confirm');
    Route::get('/registerstep6', [App\Http\Controllers\user\RegisterController::class, 'Register6'])->name('user.registerstep6');
    Route::post('/registerstep6confirm', [App\Http\Controllers\user\RegisterController::class, 'Register6Confirm'])->name('user.registerstep6confirm');
    Route::get('/registerstep7', [App\Http\Controllers\user\RegisterController::class, 'Register7'])->name('user.registerstep7');
    Route::post('/registerstep7confirm', [App\Http\Controllers\user\RegisterController::class, 'Register7Confirm'])->name('user.registerstep7confirm');
    Route::get('/registerstep8', [App\Http\Controllers\user\RegisterController::class, 'Register8'])->name('user.registerstep8');
    Route::post('/registerstep8confirm', [App\Http\Controllers\user\RegisterController::class, 'Register8Confirm'])->name('user.registerstep8confirm');
    Route::get('/registerstep9', [App\Http\Controllers\user\RegisterController::class, 'Register9'])->name('user.registerstep9');
    Route::post('/registerstep9confirm', [App\Http\Controllers\user\RegisterController::class, 'Register9Confirm'])->name('user.registerstep9confirm');
    Route::get('/registerstep10', [App\Http\Controllers\user\RegisterController::class, 'Register10'])->name('user.registerstep10');
    
    Route::get('/emaillink', [App\Http\Controllers\user\RegisterController::class, 'EmailLink'])->name('user.emaillink');
    
    Route::post('/registerconfirmwithajax', [App\Http\Controllers\user\RegisterController::class, 'Register'])->name('user.registerconfirm');
    Route::post('/registerconfirmwithoutajax', [App\Http\Controllers\user\RegisterController::class, 'Register'])->name('user.registerconfirmwithout');

    // Route::get('/servicesregister', [App\Http\Controllers\user\ServicesRegisterController::class, 'Show'])->name('user.servicesregister');
    // Route::post('/registerAjax', [App\Http\Controllers\user\ServicesRegisterController::class, 'RegisterAjax'])->name('user.registerAjax');
    // Route::post('/registerservicesConfirm', [App\Http\Controllers\user\ServicesRegisterController::class, 'Register'])->name('user.registerservicesConfirm');
    Route::post('/registerservicesfamilyConfirm', [App\Http\Controllers\user\ServicesRegisterController::class, 'RegisterFamily'])->name('user.registerservicesfamilyConfirm');


    Route::get('/home', [App\Http\Controllers\user\HomeController::class, 'Show'])->name('user.home');
    Route::post('/homeAjax', [App\Http\Controllers\user\HomeController::class, 'Homeajax'])->name('user.homeAjax');
    Route::get('/logout', [App\Http\Controllers\user\LoginController::class, 'Logout'])->name('user.logout');
    Route::get('/profile', [App\Http\Controllers\user\HomeController::class, 'Profile'])->name('user.profile');
    Route::get('/managefamily', [App\Http\Controllers\user\FamilyController::class, 'Show'])->name('user.managefamily');
    Route::get('/addfamilymember', [App\Http\Controllers\user\FamilyController::class, 'Add'])->name('user.addfamilymember');
    Route::post('/addfamilymemberconfirm', [App\Http\Controllers\user\FamilyController::class, 'AddConfirm'])->name('user.addfamilymemberconfirm');
    Route::get('/addfamilymember2', [App\Http\Controllers\user\FamilyController::class, 'Add2'])->name('user.addfamilymember2');
    Route::post('/addfamilymemberconfirm2', [App\Http\Controllers\user\FamilyController::class, 'AddConfirm2'])->name('user.addfamilymemberconfirm2');
    Route::get('/addfamilymember3', [App\Http\Controllers\user\FamilyController::class, 'Add3'])->name('user.addfamilymember3');
    Route::post('/addfamilymemberconfirm3', [App\Http\Controllers\user\FamilyController::class, 'AddConfirm3'])->name('user.addfamilymemberconfirm3');
    Route::get('/addfamilymember4', [App\Http\Controllers\user\FamilyController::class, 'Add4'])->name('user.addfamilymember4');
    Route::post('/addfamilymemberconfirm4', [App\Http\Controllers\user\FamilyController::class, 'AddConfirm4'])->name('user.addfamilymemberconfirm4');
    Route::get('/editfamilymember/{id?}', [App\Http\Controllers\user\FamilyController::class, 'EditShow'])->name('user.editfamilymember');
    Route::post('/editfamilymemberconfirm', [App\Http\Controllers\user\FamilyController::class, 'Edit'])->name('user.editfamilymemberconfirm');

    Route::get('/editfamilymember2/{id?}', [App\Http\Controllers\user\FamilyController::class, 'EditShow2'])->name('user.editfamilymember2');
    Route::get('/editfamilymember3/{id?}', [App\Http\Controllers\user\FamilyController::class, 'EditShow3'])->name('user.editfamilymember3');
    Route::get('/editfamilymember4/{id?}', [App\Http\Controllers\user\FamilyController::class, 'EditShow4'])->name('user.editfamilymember4');


    Route::get('/servicesmanagefinance', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageFinance'])->name('user.servicesmanagefinance');
    Route::get('/servicesmanagefamily', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageFAMILY'])->name('user.servicesmanagefamily');
    Route::get('/servicesmanagemarriages', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageMARRIAGES'])->name('user.servicesmanagemarriages');
    Route::get('/servicesmanagereligious', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageRELIGIOUS'])->name('user.servicesmanagereligious');
    Route::get('/servicesmanagereunion', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageREUNION'])->name('user.servicesmanagereunion');
    Route::get('/servicesmanageproperty', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManagePROPERTY'])->name('user.servicesmanageproperty');
    Route::get('/servicesmanagedivorce', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageDIVORCE'])->name('user.servicesmanagedivorce');
    Route::get('/servicesmanageother', [App\Http\Controllers\user\ServicesRegisterController::class, 'ManageOTHER'])->name('user.servicesmanageother');

    Route::get('/servicesregisterfinance', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowFinance'])->name('user.servicesregisterfinance');
    Route::get('/servicesregisterfamily', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowFAMILY'])->name('user.servicesregisterfamily');
    Route::get('/servicesregistermarriages', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowMARRIAGES'])->name('user.servicesregistermarriages');
    Route::get('/servicesregisterreligious', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowRELIGIOUS'])->name('user.servicesregisterreligious');
    Route::get('/servicesregisterreunion', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowREUNION'])->name('user.servicesregisterreunion');
    Route::get('/servicesregisterproperty', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowPROPERTY'])->name('user.servicesregisterproperty');
    Route::get('/servicesregisterdivorce', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowDIVORCE'])->name('user.servicesregisterdivorce');
    Route::get('/servicesregisterother', [App\Http\Controllers\user\ServicesRegisterController::class, 'ShowOTHER'])->name('user.servicesregisterother');

    Route::post('/registerservicesConfirm', [App\Http\Controllers\user\ServicesRegisterController::class, 'Register'])->name('user.registerservicesConfirm');
    
    Route::get('/viewservice/{id?}', [App\Http\Controllers\user\ServicesRegisterController::class, 'ViewService'])->name('user.viewservice');

    Route::get('/managecertificate', [App\Http\Controllers\user\CertificateController::class, 'Manage'])->name('user.managecertificate');
    Route::get('/addcertificate', [App\Http\Controllers\user\CertificateController::class, 'ShowAdd'])->name('user.addcertificate');
    Route::post('/addcertificateConfirm', [App\Http\Controllers\user\CertificateController::class, 'Add'])->name('user.addcertificateConfirm');
    Route::get('/certificateedit/{id?}', [App\Http\Controllers\user\CertificateController::class, 'ShowEdit'])->name('user.certificateedit');
    Route::post('/editcertificateConfirm', [App\Http\Controllers\user\CertificateController::class, 'Edit'])->name('user.editcertificateConfirm');
    Route::get('/report/{id?}', [App\Http\Controllers\user\CertificateController::class, 'ShowReport'])->name('user.report');


    Route::post('/edirstage1', [App\Http\Controllers\user\HomeController::class, 'EditStage1'])->name('user.edirstage1');
    Route::post('/edirstage2', [App\Http\Controllers\user\HomeController::class, 'EditStage2'])->name('user.edirstage2');
    Route::post('/edirstage3', [App\Http\Controllers\user\HomeController::class, 'EditStage3'])->name('user.edirstage3');
    Route::post('/edirstage4', [App\Http\Controllers\user\HomeController::class, 'EditStage4'])->name('user.edirstage4');
    Route::post('/edirstage5', [App\Http\Controllers\user\HomeController::class, 'EditStage5'])->name('user.edirstage5');
    Route::post('/edirstage6', [App\Http\Controllers\user\HomeController::class, 'EditStage6'])->name('user.edirstage6');
    Route::post('/edirstage7', [App\Http\Controllers\user\HomeController::class, 'EditStage7'])->name('user.edirstage7');
    Route::post('/edirstage8', [App\Http\Controllers\user\HomeController::class, 'EditStage8'])->name('user.edirstage8');
    Route::post('/changepassword', [App\Http\Controllers\user\HomeController::class, 'ChangePass'])->name('user.changepassword');
    Route::post('/logoupload', [App\Http\Controllers\user\HomeController::class, 'LogoUpload'])->name('user.logoupload');
    
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
    Route::get('/userdocdownload/{link?}', [App\Http\Controllers\admin\UserController::class, 'Download'])->name('admin.userdocdownload');

    Route::post('/userAccept', [App\Http\Controllers\admin\UserController::class, 'Acept'])->name('admin.userAccept');
    Route::post('/userReject', [App\Http\Controllers\admin\UserController::class, 'Reject'])->name('admin.userReject');

    Route::get('/services', [App\Http\Controllers\admin\ServicesController::class, 'Show'])->name('admin.services');
    Route::get('/servicesedit/{id?}', [App\Http\Controllers\admin\ServicesController::class, 'Edit'])->name('admin.servicesedit');
    Route::post('/serviceseditconfirm', [App\Http\Controllers\admin\ServicesController::class, 'EditConfirm'])->name('admin.serviceseditconfirm');

    // admin.gurdwaralogin
    Route::get('/admingurdwaralogin', [App\Http\Controllers\admin\GurdwaraController::class, 'GurdwaraLogin'])->name('admin.gurdwaralogin');

    Route::get('/certificate', [App\Http\Controllers\admin\CertificateController::class, 'Show'])->name('admin.certificate');
    Route::get('/certificateedit/{id?}', [App\Http\Controllers\admin\CertificateController::class, 'Edit'])->name('admin.certificateedit');
    Route::post('/certificateeditconfirm', [App\Http\Controllers\admin\CertificateController::class, 'EditConfirm'])->name('admin.certificateeditconfirm');

});