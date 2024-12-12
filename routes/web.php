<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\{
    BladderController,
    BreastController,
    ColoController,
    EndometrialController,
    KidneyController,
    LeukemiaController,
    LiverController,
    LungController,
    MelanomaController,
    NhlController,
    PancreaticController,
    ProstateController,
    ThyroidController,
    FaqController,
    HomeController
};

// Home route
Route::get('/', fn () => view('welcome'));

// Static pages
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Cancer information routes
Route::group(['prefix' => 'cancer'], function () {
    Route::get('/bladder', [BladderController::class, 'index'])->name('bladder');
    Route::get('/breast', [BreastController::class, 'index'])->name('breast');
    Route::get('/colorectal', [ColoController::class, 'index'])->name('colorectal');
    Route::get('/endometrial', [EndometrialController::class, 'index'])->name('endometrial');
    Route::get('/kidney', [KidneyController::class, 'index'])->name('kidney');
    Route::get('/leukemia', [LeukemiaController::class, 'index'])->name('leukemia');
    Route::get('/liver', [LiverController::class, 'index'])->name('liver');
    Route::get('/lung', [LungController::class, 'index'])->name('lung');
    Route::get('/melanoma', [MelanomaController::class, 'index'])->name('melanoma');
    Route::get('/nhl', [NhlController::class, 'index'])->name('nhl');
    Route::get('/pancreatic', [PancreaticController::class, 'index'])->name('pancreatic');
    Route::get('/prostate', [ProstateController::class, 'index'])->name('prostate');
    Route::get('/thyroid', [ThyroidController::class, 'index'])->name('thyroid');
});

// API routes
Route::get('/api/pubmed', function (Request $request) {
    $term = $request->input('term', 'bladder cancer herb plant');
    $apiKey = env('API_KEY');
    $url = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi";

    $response = Http::get($url, [
        'db' => 'pubmed',
        'retmax' => 20,
        'term' => $term,
        'api_key' => $apiKey,
        'usehistory' => 'y',
    ]);

    return response($response->body(), $response->status())
        ->header('Content-Type', $response->header('Content-Type'));
});
