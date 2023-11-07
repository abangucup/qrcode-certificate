<?php

use App\Http\Controllers\HasilController;
use App\Http\Controllers\PenilaianController;
use App\Models\Hasil;
use App\Models\Usaha;
use Illuminate\Support\Facades\Route;

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
    $usahas = Usaha::all();
    $countHasil = Hasil::count();
    return view('dashboard.index', compact('usahas', 'countHasil'));
})->name('home');
Route::resource('usaha', PenilaianController::class);
Route::resource('hasil', HasilController::class);
