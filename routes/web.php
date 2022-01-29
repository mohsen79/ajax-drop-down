<?php

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\JsonDecoder;

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
Route::get('drop', function () {
    $countries = Country::all();
    $first = Country::all()->first();
    return view('drop', compact('countries','first'));
});
Route::get('cities', function (Request $request) {
    $country = Country::find($request->country);
    // $json = response()->json($country->cities);
    // $json = json_encode($country->cities);
    // return $json;
    return $country->cities;
    // $counry->cities()->create([
    //     'name' => 'torin'
    // ]);
    // return $counry->cities;
    return view('drop', compact('countries'));
});
