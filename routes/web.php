<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterHealthOfficer;
use App\Http\Controllers\Auth\RegisterfundsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\MoneyDistributedController;
use App\Http\Controllers\GraphsController;
use App\Http\Controllers\GraphicalController;
use App\Http\Controllers\recordscontroller;

Route::get('/', function () {
    return view('layouts.app');
});
//contact us page
Route::get('/contactus', function () {
  return view('contactus');
});

//healthofficers
Route::get('/registerofficer', [RegisterHealthOfficer::class,'index'])->name('registerofficer');
Route::post('/registerofficer', [RegisterHealthOfficer::class,'store']);
//funds
Route::get('/registerdonormoney', [RegisterfundsController::class, 'index'])->name('registerdonormoney');
Route::post('/registerdonormoney', [RegisterfundsController::class, 'store']);

//patients
Route::get('/patientlist', [PatientsController::class ,'index'])->name('patientlist');
//money distribution
Route::get('/money', [MoneyDistributedController::class, 'index'])->name('money');
Route::post('/money', [MoneyDistributedController::class, 'store']);
//graphs
Route::get('/graphs', [GraphsController::class, 'index'])->name('graphs');
Route::get('/graphical',[GraphicalController::class, 'index'])->name('graphical');
//for records

  Route::get('/records',function(){
      return view('records');
  }); 
  Route::get('/records',[recordscontroller::class,'index'])->name('records');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//returning records
Route::get('/general',[recordscontroller::class,'give']);
Route::get('/national',[recordscontroller::class,'nation']);
Route::get('/regional',[recordscontroller::class,'region']);
//returning available funds
Route::get('/availablefunds',[RegisterfundsController::class,'show']);
