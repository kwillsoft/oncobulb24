<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
use Illuminate\Support\Facades\Http;

Route::get('/proxy/pubmed', function (Request $request) {
    $term = $request->input('term', 'plant cancer kidney herb NOT id=33634751');
    $api_key = env('API_KEY');
    $url = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi";

    // First API call: Get WebEnv and QueryKey
    $response = Http::get($url, [
        'db' => 'pubmed',
        'retmax' => 20,
        'term' => $term,
        'api_key' => $api_key,
        'usehistory' => 'y',
    ]);

    return response($response->body(), $response->status())
           ->header('Content-Type', $response->header('Content-Type'));
});

Route::get('/proxy/efetch', function (Request $request) {
    $query_key = $request->input('query_key');
    $web_env = $request->input('web_env');
    $api_key = env('API_KEY');
    $url = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi";

    // Second API call: Fetch abstracts
    $response = Http::get($url, [
        'db' => 'pubmed',
        'retmax' => 20,
        'api_key' => $api_key,
        'retmode' => 'xml',
        'rettype' => 'abstract',
        'query_key' => $query_key,
        'WebEnv' => $web_env,
    ]);

    return response($response->body(), $response->status())
           ->header('Content-Type', $response->header('Content-Type'));
});
