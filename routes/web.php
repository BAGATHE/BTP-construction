<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\ClientAuthController;
use App\Http\Controllers\Client\ClientDevisController;
use Illuminate\View\View;
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

/**index page */
Route::get('/',[HomeController::class,'index']);




/**ROUTE CLIENT**/
Route::get('/client/login',[ClientAuthController::class,'showLoginForm'])->name('client.login');
Route::post('/client/login',[ClientAuthController::class,'login']);
Route::delete('/client/logout',[ClientAuthController::class,'logout'])->name('client.logout');

Route::group([], function () {
    Route::get('/client/home', [ClientDevisController::class, 'index'])->name('client.home');
    Route::get('/client/devis', [ClientDevisController::class, 'showDevisForm'])->name('client.devis.create');
    Route::post('/client/devis', [ClientDevisController::class, 'storeDevis']);

    Route::get('/client/pdf', function(){
       return view('client.devispdf');
    });
});

/*Route ADMIN*/

