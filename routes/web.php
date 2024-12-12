<?php

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
    return view('welcome');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/bladder', [App\Http\Controllers\BladderController::class, 'index'])->name('bladder');
Route::get('/breast', [App\Http\Controllers\BreastController::class, 'index'])->name('breast');
Route::get('/colorectal', [App\Http\Controllers\ColoController::class, 'index'])->name('colorectal');
Route::get('/endometrial', [App\Http\Controllers\EndometrialController::class, 'index'])->name('endometial');
Route::get('/kidney', [App\Http\Controllers\KidneyController::class, 'index'])->name('kidney');
Route::get('/leukemia', [App\Http\Controllers\LeukemiaController::class, 'index'])->name('leukemia');
Route::get('/liver', [App\Http\Controllers\LiverController::class, 'index'])->name('liver');
Route::get('/lung', [App\Http\Controllers\LungController::class, 'index'])->name('lung');
Route::get('/melanoma', [App\Http\Controllers\MelanomaController::class, 'index'])->name('melanoma');
Route::get('/nhl', [App\Http\Controllers\NhlController::class, 'index'])->name('nhl');
Route::get('/pancreatic', [App\Http\Controllers\PancreaticController::class, 'index'])->name('pancreatic');
Route::get('/prostate', [App\Http\Controllers\ProstateController::class, 'index'])->name('prostate');
Route::get('/thyroid', [App\Http\Controllers\ThyroidController::class, 'index'])->name('thyroid');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('faq'); 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Illuminate\Support\Facades\Http;

Route::get('/api/pubmed', function (Request $request) {
    $term = $request->input('term', 'bladder cancer herb plant');
    $api_key = env('API_KEY');
    
    $url = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi";
    $response = Http::get($url, [
        'db' => 'pubmed',
        'retmax' => 20,
        'term' => $term,
        'api_key' => $api_key,
        'usehistory' => 'y'
    ]);

    return response($response->body(), $response->status())
            ->header('Content-Type', $response->header('Content-Type'));
});
