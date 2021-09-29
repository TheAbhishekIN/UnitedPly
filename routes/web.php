<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PriceListController;
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
    return view('auth.login');
});
Route::get('/about-us', function () {
    return view('welcome');
})->name('about');

Route::get('/dealer-login/{id}', [DealerController::class, 'dealer_login']);

Route::middleware(['auth:sanctum', 'verified','isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('/catalog', [CatalogController::class, 'index'])->name('admin.catalog');
    Route::get('/create-catalog', [CatalogController::class, 'create'])->name('admin.create_catalog');
    Route::post('/save-catalog', [CatalogController::class, 'store'])->name('admin.save_catalog');

    Route::get('/dealer', [DealerController::class, 'index'])->name('admin.dealer');
    Route::get('/create-dealer', [DealerController::class, 'create'])->name('admin.create_dealer');
    Route::post('/save-dealer', [DealerController::class, 'save'])->name('admin.save_dealer');
    Route::get('/add-member/{id}', [DealerController::class, 'addMember'])->name('admin.add_member');
    Route::post('/save-member', [DealerController::class, 'saveMember'])->name('admin.save_member');

    Route::get('/invoice', [InvoiceController::class, 'index'])->name('admin.invoice');
    Route::get('/create-invoice', [InvoiceController::class, 'create'])->name('admin.create_invoice');
    Route::post('/save-invoice', [InvoiceController::class, 'save'])->name('admin.save_invoice');

    Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands');
    Route::get('/create-brand', [BrandController::class, 'create'])->name('admin.create_brand');
    Route::post('/save-brand', [BrandController::class, 'save'])->name('admin.store_brand');

    Route::get('/price-list', [PriceListController::class, 'index'])->name('admin.price_lists');
    Route::get('/create-price-list', [PriceListController::class, 'create'])->name('admin.create_price_list');
    Route::post('/save-price-list', [PriceListController::class, 'store'])->name('admin.store_price_list');


});


Route::middleware(['auth:sanctum', 'verified','isDealer'])->prefix('dealer')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dealer.dashboard');

    Route::get('/catalog', [CatalogController::class, 'index'])->name('dealer.catalog');
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('dealer.invoice');
    Route::get('/price-list', [PriceListController::class, 'index'])->name('dealer.price_lists');

});

Route::get('qr-code-g', function () {
  
    \QrCode::size(500)
            ->format('png')
            ->generate('https://dealer.plyunited.com/admin/dealer', public_path('images/qrcode.png'));
    
  return view('qrCode');
    
});