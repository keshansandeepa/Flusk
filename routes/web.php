<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Patient\PatientsController;
use App\Controllers\Hospital\HospitalController;
use \App\Controllers\ICU\IcuController;
use App\Controllers\ICU\IcuTransferController;
use App\Controllers\Administrative\AdministrativeController;
use App\Controllers\ManageStaff;
use App\Middleware\RedirectIfGuest;
use App\Middleware\RedirectIfAuthenticated;

$app->get('/', HomeController::class .':index')->setName('home')->add(RedirectIfGuest::class);

$app->post('/upload', HomeController::class .':upload')->setName('upload')->add(RedirectIfGuest::class);


/**
 Patients Routes
 */

$app->get('/patients', PatientsController::class .':index')->setName('patients.index')->add(RedirectIfGuest::class);

$app->post('/patients', PatientsController::class .':store')->add(RedirectIfGuest::class);

$app->get('/patients/create', PatientsController::class .':create')->setName('patients.create')->add(RedirectIfGuest::class);

$app->get('/patients/{id}', PatientsController::class .':view')->setName('patients.view')->add(RedirectIfGuest::class);

$app->get('/patients/edit/{id}', PatientsController::class .':edit')->setName('patients.edit')->add(RedirectIfGuest::class);

$app->post('/patients/update/{id}', PatientsController::class .':update')->setName('patients.update')->add(RedirectIfGuest::class);



/**
 * Hospital Routes
 */

$app->get('/hospitals',HospitalController::class .':index')->setName('hospitals.index')->add(RedirectIfGuest::class);

$app->post('/hospitals',HospitalController::class .':store')->add(RedirectIfGuest::class);

$app->get('/hospitals/create',HospitalController::class .':create')->setName('hospitals.create')->add(RedirectIfGuest::class);

$app->get('/hospitals/{id}',HospitalController::class .':view')->setName('hospitals.view')->add(RedirectIfGuest::class);


/**
 *
 * Wards Routes
 */

$app->get('/wards/{hospital_id}/create',\App\Controllers\Wards\WardController::class .':attach')->setName('ward.attach')->add(RedirectIfGuest::class);

$app->post('/wards/{hospital_id}/store',\App\Controllers\Wards\WardController::class .':store')->setName('ward.attach.store')->add(RedirectIfGuest::class);


/**
 *
 * Icu Routes
 */



$app->get('/icu-units',IcuController::class .':index')->setName('icu-beds.index')->add(RedirectIfGuest::class);

$app->post('/icu-units',IcuController::class .':store')->add(RedirectIfGuest::class);

$app->get('/icu-units/create',IcuController::class .':create')->setName('icu-beds.create')->add(RedirectIfGuest::class);
$app->get('/icu-units/{id}',IcuController::class .':view')->setName('icu-beds.view')->add(RedirectIfGuest::class);

$app->post('/icu-units/update/bed/{id}',IcuController::class .':bedUpdate')->setName('icu-beds.update')->add(RedirectIfGuest::class);

$app->post('/icu-units/bed/{icuId}',IcuController::class .':bedAdd')->setName('icu-beds.add')->add(RedirectIfGuest::class);




$app->get('/icu-transfer',IcuTransferController::class .':index')->setName('icu.transfer.index')->add(RedirectIfGuest::class);
$app->get('/icu-transfer/new/step-1',IcuTransferController::class .':stepOne')->setName('icu.transfer.stepOne')->add(RedirectIfGuest::class);

$app->post('/icu-transfer/new/step-1',IcuTransferController::class .':stepOnePost')->add(RedirectIfGuest::class);

$app->get('/icu-transfer/new/step-2/{id}',IcuTransferController::class .':stepTwo')->setName('icu.transfer.stepTwo')->add(RedirectIfGuest::class);

$app->post('/icu-transfer/new/step-2/{id}',IcuTransferController::class .':stepTwoPost')->setName('icu.transfer.stepTwo')->add(RedirectIfGuest::class);

$app->get('/icu-transfer/new/step-3/{id}',IcuTransferController::class .':stepThree')->setName('icu.transfer.stepThree')->add(RedirectIfGuest::class);

$app->post('/icu-transfer/new/step-3/{id}',IcuTransferController::class .':stepThreePost')->add(RedirectIfGuest::class);

$app->post('/icu-transfer/new/step-3/{id}/signature',IcuTransferController::class .':stepThreeSignature')->setName('SignaturePost')->add(RedirectIfGuest::class);


$app->get('/icu-transfer/new/step-4/{id}',IcuTransferController::class .':stepFour')->setName('icu.transfer.stepFour')->add(RedirectIfGuest::class);


$app->get('/icu-manage',IcuTransferController::class .':manageIcu')->setName('icu.manage.index')->add(RedirectIfGuest::class);

$app->post('/icu-manage/transfer/{transferId}/bed/{icuBed}',IcuTransferController::class .':manageIcuPost')->setName('icu.manage.post')->add(RedirectIfGuest::class);



$app->get('/administrative',AdministrativeController::class .':index')->setName('administrative.index')->add(RedirectIfGuest::class);

$app->post('/administrative/{id}',AdministrativeController::class .':update')->setName('administrative.update')->add(RedirectIfGuest::class);
$app->get('/administrative/transfer/{id}',AdministrativeController::class .':view')->setName('administrative.view')->add(RedirectIfGuest::class);
$app->post('/administrative/transfer/signature/{id}}',AdministrativeController::class .':signature')->setName('signature.id')->add(RedirectIfGuest::class);




$app->get('/user-manage',ManageStaff::class .':index')->setName('user.manage.index')->add(RedirectIfGuest::class);

$app->get('/user-manage/create',ManageStaff::class .':create')->setName('user.manage.create')->add(RedirectIfGuest::class);
$app->post('/user-manage',ManageStaff::class .':store')->add(RedirectIfGuest::class);

$app->get('/user-manage/{id}',ManageStaff::class .':view')->setName('user.manage.view')->add(RedirectIfGuest::class);
    $app->get('/user-manage/edit/{id}',ManageStaff::class .':edit')->setName('user.manage.update')->add(RedirectIfGuest::class);
$app->post('/user-manage/edit/{id}',ManageStaff::class .':update')->add(RedirectIfGuest::class);


/**
 * Auth Routes
 */

$app->get('/login', LoginController::class .':index')->setName('auth.login')->add(RedirectIfAuthenticated::class);

$app->post('/login', LoginController::class .':action')->add(RedirectIfAuthenticated::class);

$app->get('/logout', SignOutController::class)->setName('auth.logout');



