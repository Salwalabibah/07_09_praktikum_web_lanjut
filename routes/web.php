<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
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
    return view('welcome');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa/nilai/{mahasiswa}', [MahasiswaController::class, 'nilai'])->name('mahasiswa.nilai');
Route::get('/mahasiswa/{mahasiswa}/cetakKRS', [MahasiswaController::class, 'cetak_krs'])->name('mahasiswa.cetakKRS');

Route::resource('article', ArticleController::class);
Route::get('/articles/cetak_pdf', [ArticleController::class, 'cetak_pdf'])->name('article.cetak_pdf');
