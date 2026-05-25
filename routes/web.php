<?php

use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Anggota;

/*
|--------------------------------------------------------------------------
| Web Routes - Tugas Pertemuan 10
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// =========================================================
// Tugas 2C: Testing Route Accessor & Scope
// =========================================================
Route::get('/test-accessor-scope', function () {

    $semuaBuku    = Buku::all();
    $bukuTerbaru  = Buku::terbaru()->get();
    $stokMenipis  = Buku::stokMenipis()->get();
    $hargaRange   = Buku::hargaRange(150000, 200000)->get();

    $semuaAnggota        = Anggota::all();
    $anggotaPria         = Anggota::jenisKelamin('L')->get();
    $anggotaWanita       = Anggota::jenisKelamin('P')->get();
    $terdaftarBulanIni   = Anggota::terdaftarBulanIni()->get();

    return view('test-accessor-scope', compact(
        'semuaBuku',
        'bukuTerbaru',
        'stokMenipis',
        'hargaRange',
        'semuaAnggota',
        'anggotaPria',
        'anggotaWanita',
        'terdaftarBulanIni'
    ));
});
