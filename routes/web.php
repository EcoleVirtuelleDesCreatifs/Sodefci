<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\MentionsController;
use App\Http\Controllers\ValeurController;

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


//Route Menu site
Route::get('/notre-histoire/', [AboutController::class, 'index'])->name('pages.about');
Route::get('/nos-services/', [ServicesController::class, 'index'])->name('pages.services');
Route::get('/nos-realisations/', [WorkController::class, 'index'])->name("pages.work");
Route::get('/nos-produits/', [ProductsController::class, 'index'])->name('pages.product');
Route::post('/nos-produits/', [ProductsController::class, 'store'])->name('product.store');

Route::get('/demande-de-devis/', [DevisController::class, 'index'])->name('pages.devis');
Route::post('/demande-de-devis/', [DevisController::class, 'store'])->name('devis.store');

Route::get('/contact-nous/', [ContactController::class, 'index'])->name('pages.contact');
Route::post('/contact-nous/', [ContactController::class, 'store'])->name('contact.store');

Route::get('/nos-valeurs/', [ValeurController::class, 'index'])->name('pages.valeur');
Route::get('/mentions-legales/', [MentionsController::class, 'index'])->name('pages.mentions');

//404
Route::fallback(function() {
    return view('404.404'); // la vue 404.blade.php
 });

Route::get('/', function () {
    return view('welcome')->with('seoPage', 'welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
