<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BengkelController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\BarangController;

use App\Http\Controllers\BookingServisController;

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
    return view('welcome');
});


    // registrasi
Route::get('/register', [AutentikasiController::class, 'formRegister']);
Route::post('/register', [AutentikasiController::class, 'register']);

    // login
Route::get('/login', [AutentikasiController::class, 'formLogin']);
Route::post('/login', [AutentikasiController::class, 'login']);

    // logout
Route::get('/logout', [AutentikasiController::class, 'logout']);


Route::middleware(['pelanggan'])->group(function () {
    Route::get('/dashboard/pelanggan', [PelangganController::class, 'dashboard']);

    //pelanggan menu
    Route::get('/pelanggan/sparepart', [PelangganController::class, 'sparepart']);
    Route::get('/pelanggan/booking-servis', [PelangganController::class, 'bookingServis']);
    Route::post('/pelanggan/booking-servis', [PelangganController::class, 'prosesBookingServis']);
    Route::get('/pelanggan/rute-bengkel', [PelangganController::class, 'ruteBengkel']);

    // jadwal servis
    Route::get('/jadwal-servis', [PelangganController::class, 'jadwalServis']);
});




Route::middleware(['bengkel'])->group(function () {
    Route::get('/dashboard/bengkel', [BengkelController::class, 'dashboard'])->name('bengkel.dashboard');

    // Barang
    Route::get('/bengkel/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/bengkel/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/bengkel/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/bengkel/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/bengkel/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/bengkel/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    // Booking Servis
    Route::get('/bengkel/booking-servis', [BookingServisController::class, 'index'])->name('booking_servis.index');
    Route::post('/bengkel/booking-servis/{id}/update-status', [BookingServisController::class, 'updateStatus'])->name('booking_servis.update_status');

    //kelola maps 
    Route::get('/bengkel/edit-lokasi', [BengkelController::class, 'editLokasi'])->name('bengkel.editLokasi');
    Route::post('/bengkel/update-lokasi', [BengkelController::class, 'updateLokasi'])->name('bengkel.updateLokasi');

});


// Route::middleware(['bengkel'])->group(function () {
//     Route::get('/dashboard/bengkel', [BengkelController::class, 'dashboard']);
// });



// Route::middleware(['pelanggan'])->group(function () {
//     Route::get('/dashboard/pelanggan', [PelangganController::class, 'dashboard']);

// });