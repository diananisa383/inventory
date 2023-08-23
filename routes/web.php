<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\PengirimController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\LaporanMasukController;
use App\Http\Controllers\LaporanKeluarController;
use App\Http\Controllers\LaporanStokController;
use App\Http\Controllers\DashboardController;

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

Route::get('/tampil', function () {
    return view('blank');
});

Route::middleware(['check.admin.approval'])->group(function () {
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register']);
    Route::middleware(['check.admin.approval'])->get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    // ... definisikan rute lainnya yang membutuhkan middleware
});

Route::get('/tampil-user', [UserController::class, 'index'])->name('user.index');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/edit-user', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update-user', [UserController::class, 'update'])->name('user.update');
Route::get('/user-destroy', [UserController::class, 'destroyConfirmation'])->name('user.destroy');
Route::delete('/user-hapus', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/tampil-role', [RoleController::class, 'index'])->name('role.index');
Route::post('/store-role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::get('/edit-role', [RoleController::class, 'edit'])->name('role.edit');
Route::put('/update-role', [RoleController::class, 'update'])->name('role.update');
Route::get('/role-destroy', [RoleController::class, 'destroyConfirmation'])->name('role.destroy');
Route::delete('/role-hapus', [RoleController::class, 'destroy'])->name('role.destroy');

Route::get('/tampil-satuan', [SatuanController::class, 'index'])->name('satuan.index');
Route::post('/store-satuan', [SatuanController::class, 'store'])->name('satuan.store');
Route::get('/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
Route::get('/edit-satuan/{satuan}', [SatuanController::class, 'edit'])->name('satuan.edit');
Route::put('/update-satuan/{satuan}', [SatuanController::class, 'update'])->name('satuan.update');
Route::delete('/satuan-hapus/{satuan}', [SatuanController::class, 'destroy'])->name('satuan.destroy');


Route::prefix('jenis')->group(function () {
    Route::get('/tampil', [JenisController::class, 'index'])->name('jenis.index');
    Route::post('/store', [JenisController::class, 'store'])->name('jenis.store');
    Route::get('/create', [JenisController::class, 'create'])->name('jenis.create');
    Route::get('/edit/{jenis}', [JenisController::class, 'edit'])->name('jenis.edit');
    Route::put('/update/{jenis}', [JenisController::class, 'update'])->name('jenis.update');
    Route::delete('/hapus/{jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy');
});

Route::get('/tampil-penerima', [PenerimaController::class, 'index'])->name('penerima.index');
Route::post('/store-penerima', [PenerimaController::class, 'store'])->name('penerima.store');
Route::get('/penerima/create', [PenerimaController::class, 'create'])->name('penerima.create');
Route::get('/edit-penerima/{penerima}', [PenerimaController::class, 'edit'])->name('penerima.edit');
Route::put('/update-penerima/{penerima}', [PenerimaController::class, 'update'])->name('penerima.update');
Route::get('/penerima-destroy/{penerima}', [PenerimaController::class, 'destroyConfirmation'])->name('penerima.destroy');
Route::delete('/penerima-hapus/{penerima}', [PenerimaController::class, 'destroy'])->name('penerima.destroy');



Route::get('/tampil-pengirim', [PengirimController::class, 'index'])->name('pengirim.index');
Route::post('/store-pengirim', [PengirimController::class, 'store'])->name('pengirim.store');
Route::get('/pengirim/create', [PengirimController::class, 'create'])->name('pengirim.create');
Route::get('/edit-pengirim/{pengirim}', [PengirimController::class, 'edit'])->name('pengirim.edit');
Route::put('/update-pengirim/{pengirim}', [PengirimController::class, 'update'])->name('pengirim.update');
Route::get('/pengirim-destroy/{pengirim}', [PengirimController::class, 'destroyConfirmation'])->name('pengirim.destroy');
Route::delete('/pengirim-hapus/{pengirim}', [PengirimController::class, 'destroy'])->name('pengirim.destroy');

Route::get('/tampil-barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/store-barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::get('/edit-barang/{barang}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/update-barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::get('/barang-destroy/{barang}', [BarangController::class, 'destroyConfirmation'])->name('barang.destroy');
Route::delete('/barang-hapus/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/tampil-barangmasuk', [BarangmasukController::class, 'index'])->name('barangmasuk.index');
Route::post('/store-barangmasuk', [BarangmasukController::class, 'store'])->name('barangmasuk.store');
Route::get('/barangmasuk/create', [BarangmasukController::class, 'create'])->name('barangmasuk.create');
Route::get('/edit-barangmasuk/{barangmasuk}', [BarangmasukController::class, 'edit'])->name('barangmasuk.edit');
Route::put('/update-barangmasuk/{barangmasuk}', [BarangmasukController::class, 'update'])->name('barangmasuk.update');
Route::get('/barangmasuk-destroy/{barangmasuk}', [BarangmasukController::class, 'destroyConfirmation'])->name('barangmasuk.destroy');
Route::delete('/barangmasuk-hapus/{barangmasuk}', [BarangmasukController::class, 'destroy'])->name('barangmasuk.destroy');

Route::get('/tampil-barangkeluar', [BarangkeluarController::class, 'index'])->name('barangkeluar.index');
Route::post('/store-barangkeluar', [BarangkeluarController::class, 'store'])->name('barangkeluar.store');
Route::get('/barangkeluar/create', [BarangkeluarController::class, 'create'])->name('barangkeluar.create');
Route::get('/edit-barangkeluar', [BarangkeluarController::class, 'edit'])->name('barangkeluar.edit');
Route::put('/update-barangkeluar', [BarangkeluarController::class, 'update'])->name('barangkeluar.update');
Route::get('/barangkeluar-destroy', [BarangkeluarController::class, 'destroyConfirmation'])->name('barangkeluar.destroy');
Route::delete('/barangkeluar-hapus', [BarangkeluarController::class, 'destroy'])->name('barangkeluar.destroy');

Route::get('/tampil-laporanmasuk', [LaporanMasukController::class, 'index'])->name('laporan.barangmasuk.index');
Route::post('/store-laporanmasuk', [LaporanMasukController::class, 'store'])->name('laporan.barangmasuk.store');
Route::get('/laporanmasuk/create', [LaporanMasukController::class, 'create'])->name('laporan.barangmasuk.create');
Route::get('/edit-laporanmasuk', [LaporanMasukController::class, 'edit'])->name('laporan.barangmasuk.edit');
Route::put('/update-laporanmasuk', [LaporanMasukController::class, 'update'])->name('laporan.barangmasuk.update');
Route::get('/laporanmasuk-destroy', [LaporanMasukController::class, 'destroyConfirmation'])->name('laporan.barangmasuk.destroy');
Route::delete('/laporanmasuk-hapus', [LaporanMasukController::class, 'destroy'])->name('laporan.barangmasuk.destroy');

Route::get('/tampil-laporankeluar', [LaporanKeluarController::class, 'index'])->name('laporan.barangkeluar.index');
Route::post('/store-laporankeluar', [LaporanKeluarController::class, 'store'])->name('laporan.barangkeluar.store');
Route::get('/laporankeluar/create', [LaporanKeluarController::class, 'create'])->name('laporan.barangkeluar.create');
Route::get('/edit-laporankeluar', [LaporanKeluarController::class, 'edit'])->name('laporan.barangkeluar.edit');
Route::put('/update-laporankeluar', [LaporanKeluarController::class, 'update'])->name('laporan.barangkeluar.update');
Route::get('/laporankeluar-destroy', [LaporanKeluarController::class, 'destroyConfirmation'])->name('laporan.barangkeluar.destroy');
Route::delete('/laporankeluar-hapus', [LaporanKeluarController::class, 'destroy'])->name('laporan.barangkeluar.destroy');

Route::get('/tampil-laporanstok', [LaporanStokController::class, 'index'])->name('laporan.stok.index');
Route::post('/store-laporanstok', [LaporanStokController::class, 'store'])->name('laporan.stok.store');
Route::get('/laporanstok/create', [LaporanStokController::class, 'create'])->name('laporan.stok.create');
Route::get('/edit-laporanstok', [LaporanStokController::class, 'edit'])->name('laporan.stok.edit');
Route::put('/update-laporanstok', [LaporanStokController::class, 'update'])->name('laporan.stok.update');
Route::get('/laporanstok-destroy', [LaporanStokController::class, 'destroyConfirmation'])->name('laporan.stok.destroy');
Route::delete('/laporanstok-hapus', [LaporanStokController::class, 'destroy'])->name('laporan.stok.destroy');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');