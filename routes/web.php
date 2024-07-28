<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\ClientAuthController;
use App\Http\controllers\Admin\AdminAuthController;
use App\Http\controllers\Admin\AdminDashboardController;
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
    Route::get('/devis/{type_maison}/export-pdf', [ClientDevisController::class, 'exportPDF'])->name('client.devis.exportPDF');
    Route::post('/client/payement',[ClientDevisController::class,'handlePayment']);
});

/*Route ADMIN*/
Route::get('/admin/login',[AdminAuthController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login',[AdminAuthController::class,'login']);
Route::delete('/admin/logout',[AdminAuthController::class,'logout'])->name('adminlogout');

Route::group([],function(){
    Route::get('/admin/home', [AdminDashboardController::class, 'index'])->name('admin.home');
});
