<?php
use App\Http\Controllers\KategoriFasilitasController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\LaporanKerusakanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/dashboard',
    [DashboardController::class, 'index']
)
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {

    Route::resource(
        'kategori-fasilitas',
        KategoriFasilitasController::class
    );

    Route::resource(
        'fasilitas',
        FasilitasController::class
    );

    Route::resource(
        'laporan-kerusakan',
        LaporanKerusakanController::class
    );

});

Route::get(
    '/laporan-kerusakan-pdf',
    [LaporanKerusakanController::class, 'exportPdf']
)->name('laporan-kerusakan.pdf');

Route::get(
    '/laporan-kerusakan-excel',
    [LaporanKerusakanController::class, 'exportExcel']
)->name('laporan-kerusakan.excel');

Route::patch(
    '/laporan-kerusakan/{id}/status',
    [LaporanKerusakanController::class, 'updateStatus']
)->name('laporan-kerusakan.status');



require __DIR__ . '/auth.php';
