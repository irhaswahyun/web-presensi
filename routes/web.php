<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\GuruController;
use App\Http\Controllers\Backend\JabatanController;
use App\Http\Controllers\Backend\KelasController;
use App\Http\Controllers\Backend\PresensiController;
use App\Http\Controllers\Backend\SiswaController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Guru\AbsensiController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.admin_dashboard');
    })->name('dashboard');
});

// Route::get('/dashboard', [HomeController::class, 'index']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Route crud tabel guru
    Route::prefix('gurus')->group(function(){
        Route::get('/view', [GuruController::class, 'GuruView'])->name('guru.view');
        Route::get('/add', [GuruController::class, 'GuruAdd'])->name('guru.add');
        Route::post('/store', [GuruController::class, 'GuruStore'])->name('guru.store');
        Route::get('/edit/{id}', [GuruController::class, 'GuruEdit'])->name('guru.edit');
        Route::post('/update/{id}', [GuruController::class, 'GuruUpdate'])->name('guru.update');
        Route::get('/delete/{id}', [GuruController::class, 'GuruDelete'])->name('guru.delete');
    });

    // Route crud tabel jabatan
    Route::prefix('jabatans')->group(function(){
        Route::get('/view', [JabatanController::class, 'JabatanView'])->name('jabatan.view');
        Route::get('/add', [JabatanController::class, 'JabatanAdd'])->name('jabatan.add');
        Route::post('/store', [JabatanController::class, 'JabatanStore'])->name('jabatan.store');
        Route::get('/edit/{id}', [JabatanController::class, 'JabatanEdit'])->name('jabatan.edit');
        Route::post('/update/{id}', [JabatanController::class, 'JabatanUpdate'])->name('jabatan.update');
        Route::get('/delete/{id}', [JabatanController::class, 'JabatanDelete'])->name('jabatan.delete');
    });

    // Route crud tabel siswa
    Route::prefix('siswas')->group(function(){
        Route::get('/view', [SiswaController::class, 'SiswaView'])->name('siswa.view');
        Route::get('/add', [SiswaController::class, 'SiswaAdd'])->name('siswa.add');
        Route::post('/store', [SiswaController::class, 'SiswaStore'])->name('siswa.store');
        Route::get('/edit/{id}', [SiswaController::class, 'SiswaEdit'])->name('siswa.edit');
        Route::post('/update/{id}', [SiswaController::class, 'SiswaUpdate'])->name('siswa.update');
        Route::get('/delete/{id}', [SiswaController::class, 'SiswaDelete'])->name('siswa.delete');
    });

    // Route crud tabel kelas
    Route::prefix('kelas')->group(function(){
        Route::get('/view', [KelasController::class, 'KelasView'])->name('kelas.view');
        Route::get('/add', [KelasController::class, 'KelasAdd'])->name('kelas.add');
        Route::post('/store', [KelasController::class, 'KelasStore'])->name('kelas.store');
        Route::get('/edit/{id}', [KelasController::class, 'KelasEdit'])->name('kelas.edit');
        Route::post('/update/{id}', [KelasController::class, 'KelasUpdate'])->name('kelas.update');
        Route::get('/delete/{id}', [KelasController::class, 'KelasDelete'])->name('kelas.delete');
    });

    // Route crud tabel presensi
    Route::prefix('presensis')->group(function(){
        Route::get('/view', [PresensiController::class, 'AbsenView'])->name('absen.view');
        Route::get('/add', [PresensiController::class, 'AbsenAdd'])->name('absen.add');
        Route::post('/store', [PresensiController::class, 'AbsenStore'])->name('absen.store');
        Route::get('/edit/{id}', [PresensiController::class, 'AbsenEdit'])->name('absen.edit');
        Route::post('/update/{id}', [PresensiController::class, 'AbsenUpdate'])->name('absen.update');
        Route::get('/delete/{id}', [PresensiController::class, 'AbsenDelete'])->name('absen.delete');

        // Route Data Rekap
        Route::get('/rekap/{guru_id}', [PresensiController::class, 'Rekap'])->name('absen.rekap');
    });
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['role:guru']], function () {
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi');
    Route::post('/absen-masuk', [AbsensiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen-pulang', [AbsensiController::class, 'absenPulang'])->name('absen.pulang');
    // Add other teacher routes
});

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

