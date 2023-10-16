<?php

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
    $sliders = \App\Models\Slider::all();
    $topLeft = \App\Models\Menu::ofType('TOP_LEFT')->get();
    dd($topLeft);
    return view('test', compact('sliders'));
});
