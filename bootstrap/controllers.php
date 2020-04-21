<?php

use App\Controllers\HomeController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\SignOutController;
use App\Controllers\Patient\PatientsController;
use App\Controllers\Hospital\HospitalController;
use App\Controllers\ICU\IcuController;
use App\Controllers\Wards\WardController;
use App\Controllers\ICU\IcuTransferController;
use  App\Controllers\ManageStaff;
use App\Controllers\Administrative\AdministrativeController;

$container->add(HomeController::class,function () use($container){
   return new HomeController(
       $container->get('view')
   );
});


