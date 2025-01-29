<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});


Route::get('welcome', [\App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('welcomes/{id}', [\App\Http\Controllers\WelcomeController::class, 'index1']);
Route::get('getDashboard', [\App\Http\Controllers\WelcomeController::class, 'getDashboard']);
Route::get('dashboard', [\App\Http\Controllers\WelcomeController::class, 'dashboard'])->name('dashboard');
Route::get('userInfo', [\App\Http\Controllers\WelcomeController::class, 'userInfo'])->name('userInfo');
Route::get('userType', [\App\Http\Controllers\WelcomeController::class, 'userType'])->name('userType');


Route::resource('auxiliaryItemType', \App\Http\Controllers\ItemSetup\AuxiliaryItemTypeController::class);
Route::post('/AuxiliaryItemType/data', [\App\Http\Controllers\ItemSetup\AuxiliaryItemTypeController::class, 'getdata'])->name('auxiliaryItemType.data');

Route::resource('mjrCat', \App\Http\Controllers\ItemSetup\MjrCatController::class);
Route::get('getMajor', [\App\Http\Controllers\ItemSetup\MjrCatController::class, 'getMajor'])->name('getMajor');
Route::post('/MjrCat/data', [\App\Http\Controllers\ItemSetup\MjrCatController::class, 'getdata'])->name('mjrCat.data');

Route::resource('mjrSubCat', \App\Http\Controllers\ItemSetup\MjrSubCatController::class);
Route::post('/MjrSubCat/data', [\App\Http\Controllers\ItemSetup\MjrSubCatController::class, 'getdata'])->name('mjrSubCat.data');

Route::resource('measureUnit', \App\Http\Controllers\ItemSetup\MeasureUnitController::class);
Route::post('/MeasureUnit/data', [\App\Http\Controllers\ItemSetup\MeasureUnitController::class, 'getdata'])->name('measureUnit.data');

Route::resource('itemMst', \App\Http\Controllers\ItemSetup\ItemMstController::class);
Route::post('/ItemMst/data', [\App\Http\Controllers\ItemSetup\ItemMstController::class, 'getdata'])->name('itemMst.data');

Route::resource('itemAttribute', \App\Http\Controllers\ItemSetup\ItemAttributeController::class);
Route::get('getAttribute', [\App\Http\Controllers\ItemSetup\ItemAttributeController::class, 'getAttribute'])->name('getAttribute');
Route::post('/ItemAttribute/data', [\App\Http\Controllers\ItemSetup\ItemAttributeController::class, 'getdata'])->name('itemAttribute.data');

Route::resource('itemAttributeValue', \App\Http\Controllers\ItemSetup\ItemAttributeValueController::class);
Route::post('itemAttributeValueAdd', [\App\Http\Controllers\ItemSetup\ItemAttributeValueController::class, 'itemAttributeValueAdd']);
Route::post('/ItemAttributeValue/data', [\App\Http\Controllers\ItemSetup\ItemAttributeValueController::class, 'getdata'])->name('itemAttributeValue.data');

Route::resource('itemInfo', \App\Http\Controllers\ItemSetup\ItemInfoController::class);
Route::get('showItemsDropDown', [\App\Http\Controllers\ItemSetup\ItemInfoController::class, 'showItemsDropDown']);
Route::post('/ItemInfo/data', [\App\Http\Controllers\ItemSetup\ItemInfoController::class, 'getdata'])->name('itemInfo.data');

Route::resource('purchaseOrder', \App\Http\Controllers\PO\PurchaseOrderController::class);
Route::post('/PurchaseOrder/data', [\App\Http\Controllers\PO\PurchaseOrderController::class, 'getdata'])->name('purchaseOrder.data');
Route::get('ForwordToAuthorization', [\App\Http\Controllers\PO\PurchaseOrderController::class, 'ForwordToAuthorization']);
Route::get('showDetails', [\App\Http\Controllers\PO\PurchaseOrderController::class, 'showDetails']);
