<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReturnBukuController;
use App\Http\Controllers\Api\MasterDataController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('isAdmin')->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/data', [UsersController::class, 'users'])->name('users.data');
        Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/user', [UsersController::class, 'store'])->name('user.store');
        Route::get('/user/{user}/edit', [UsersController::class, 'edit'])->name('user.edit');
        Route::put('/user/{user}', [UsersController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [UsersController::class, 'delete'])->name('user.destroy');
    });

    Route::post('/import', [ImportController::class, 'importBuku'])->name('import');
    Route::post('/import/supplier', [ImportController::class, 'importSupplier'])->name('import.supplier');
    Route::get('/sample', [ExportController::class, 'download'])->name('sample.excel');
    Route::get('/sample/supplier', [ExportController::class, 'downloadSupplier'])->name('sample.supplier');
    Route::get('/sample/buku', [ExportController::class, 'downloadbuku'])->name('sample.buku');
    Route::get('/report/view', [ExportController::class, 'viewReport'])->name('view.report');
    Route::get('/report/excel', [ExportController::class, 'reportExcel'])->name('excel.report');
    Route::get('/report/pdf', [ExportController::class, 'reportPdf'])->name('pdf.report');


    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/data', [BukuController::class, 'data'])->name('bukus.data');
    Route::get('/scanner/masuk/{id}', [MasukController::class, 'masuk']);
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    // Route::get('/buku-data', [BukuController::class, 'apiData'])->name('buku.data');
    Route::get('/buku-data', [BukuController::class, 'getData'])->name('buku.data');

    Route::get('/scanner/result/{result}', [ScannerController::class, 'result']);
    Route::get('/global/scan/{result}', [ScannerController::class, 'global']);
    Route::get('/global/scan', [ScannerController::class, 'scan'])->name('global.scan');

    Route::get('/masuk/data', [MasukController::class, 'data'])->name('masuks.data');
    Route::get('/buku-masuk', [MasukController::class, 'index'])->name('masuk.index');
    Route::get('/buku-masuk/scan', [MasukController::class, 'scan'])->name('masuk.scan');
    Route::get('/buku-masuk/result/{result}', [MasukController::class, 'result'])->name('masuk.result');
    Route::get('/buku-masuk/create', [MasukController::class, 'create'])->name('masuk.create');
    Route::post('/buku-masuk', [MasukController::class, 'store'])->name('masuk.store');
    Route::get('/buku-masuk/{id}', [MasukController::class, 'show'])->name('masuk.show');
    Route::get('/buku-masuk/{id}/edit', [MasukController::class, 'edit'])->name('masuk.edit');
    Route::put('/buku-masuk/{id}', [MasukController::class, 'update'])->name('masuk.update');
    Route::delete('/buku-masuk/{id}', [MasukController::class, 'destroy'])->name('masuk.destroy');

    Route::get('/keluar/data', [KeluarController::class, 'data'])->name('keluars.data');
    Route::get('/buku-keluar', [KeluarController::class, 'index'])->name('keluar.index');
    Route::get('/buku-keluar/scan', [KeluarController::class, 'scan'])->name('keluar.scan');
    Route::get('/buku-keluar/scan/{result}', [KeluarController::class, 'result'])->name('keluar.result');
    Route::get('/buku-keluar/create', [KeluarController::class, 'create'])->name('keluar.create');
    Route::post('/buku-keluar', [KeluarController::class, 'store'])->name('keluar.store');
    Route::get('/buku-keluar/{id}', [KeluarController::class, 'show'])->name('keluar.show');
    Route::get('/buku-keluar/{id}/edit', [KeluarController::class, 'edit'])->name('keluar.edit');
    Route::put('/buku-keluar/{id}', [KeluarController::class, 'update'])->name('keluar.update');
    Route::delete('/buku-keluar/{id}', [KeluarController::class, 'destroy'])->name('keluar.destroy');

    Route::get('/opname/data', [OpnameController::class, 'data'])->name('opnames.data');
    // Route::get('/buku-opname', [OpnameController::class, 'index'])->name('opname.index');
    Route::get('/buku-opname/filter/{month?}', [OpnameController::class, 'index'])->name('opname.index');
    Route::get('/buku-opname/scan', [OpnameController::class, 'scan'])->name('opname.scan');
    Route::get('/opname/scan/{result}', [OpnameController::class, 'result'])->name('opname.scan.result');
    Route::get('/buku-opname/create', [OpnameController::class, 'create'])->name('opname.create');
    Route::post('/buku-opname', [OpnameController::class, 'store'])->name('opname.store');
    Route::get('/buku-opname/{id}', [OpnameController::class, 'show'])->name('opname.show');
    Route::get('/buku-opname/{id}/edit', [OpnameController::class, 'edit'])->name('opname.edit');
    Route::put('/buku-opname/{id}/tambah', [OpnameController::class, 'tambah'])->name('opname.tambah');
    Route::put('/buku-opname/{id}', [OpnameController::class, 'update'])->name('opname.update');
    Route::delete('/buku-opname/{id}', [OpnameController::class, 'destroy'])->name('opname.destroy');

    Route::get('/customer/data', [CustomerController::class, 'data'])->name('customers.data');
    Route::get('/customer', [CustomerController::class, 'customerIndex'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::get('/supplier/data', [SupplierController::class, 'data'])->name('suppliers.data');
    Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::post('/supplier/book', [SupplierController::class, 'storeBook'])->name('supplier.store.book');
    Route::get('/supplier/{id}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
    Route::put('/supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    Route::get('/supplier-data', [SupplierController::class, 'getData'])->name('supplier.data');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/return/data', [ReturnBukuController::class, 'data'])->name('returns.data');
    Route::get('/return/result/{result}', [ReturnBukuController::class, 'result'])->name('return.result');
    Route::get('/return/scan', [ReturnBukuController::class, 'scan'])->name('return.scan');
    Route::resource('return', ReturnBukuController::class);

    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/unread-count', [\App\Http\Controllers\NotificationController::class, 'unreadCount'])->name('notifications.unreadCount');
    Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
});

Route::prefix('api')->middleware('auth')->group(function () {
    Route::get('/buku', [MasterDataController::class, 'buku']);
    Route::get('/supplier', [MasterDataController::class, 'supplier']);
    Route::get('/customer', [MasterDataController::class, 'customer']);
    Route::get('/buku/{id}/supplier', [BukuController::class, 'getSupplierByBuku']);
    Route::get('/buku/{id}/stok', [BukuController::class, 'getStokByBuku']);
});

require __DIR__ . '/auth.php';
