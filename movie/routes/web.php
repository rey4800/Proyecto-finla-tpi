<?php

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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\PeliculaController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\SessionsController;


use App\Http\Controllers\RegistroController;
use App\Http\Controllers\RentController;
use App\Pelicula;
use App\Rent;

Route::get('/',  'Peliculacontroller@index2')->name('home');
Route::get('/buscar', [PeliculaController::class, 'index2']);


//Al declarar como resource la ruta peliculas se crean multiples rutas para manejar acciones del recurso
//nos crea la ruta /peliculas, /peliculas/crate, /peliculas/{pelicula}/edit, /peliculas/{pelicula}/destroy
//por lo que no sera necesario declararlas aparte estas rutas

Route:: resource('peliculas','PeliculaController')
->middleware("auth.admin");

Route::get('/login', [SessionsController::class, 'create'])
->middleware('guest')
->name('login.index');

Route::get('/register', [RegistroController::class, 'create'])
->middleware('guest')
->name('register.index');

Route::post('/register', [RegistroController::class, 'store'])->name('register.store');

Route::post('/login', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');
//Route::get('/peliculas/create', 'PeliculaController@create');

Route::get('/admin',[AdminController::class, 'index'])
->middleware('auth.admin')
->name('admin.index');

Route::get('/peliculas/{pelicula}',[PeliculaController::class,'show']);

Route::get('/peliculas/{pelicula}/quitar', 'PeliculaController@quitar')
->middleware("auth.admin")
->name("peliculas.quitar");


//Ruta para los like
Route::get('/peliculas/{pelicula}/like',[PeliculaController::class,'like'])
->middleware("auth");



//rutas para la parte de Compras

Route::get('/peliculas/{peliculas}/buy', [BuyController::class, 'create'])
->middleware("auth");

Route::post('/peliculas/{peliculas}/buy',[BuyController::class, 'store'] )
->middleware("auth");

Route::get('/compras',  'BuyController@index')
->middleware('auth.admin')
->name('compras.index');

Route::get('/alquileres',  'RentController@index')
->middleware('auth.admin')
->name('alquileres.index');

//Rutas parte del alquiler
Route::get('/peliculas/{peliculas}/rent', [RentController::class, 'create'])
->middleware("auth");
Route::post('/peliculas/{peliculas}/rent',[RentController::class, 'store'] )
->middleware("auth");
Route::get('/peliculas/{pelicula}/regresar', [RentController::class, 'update'])
->middleware("auth");
Route::get('/peliculas/{pelicula}/multas',[RentController::class, 'show'])
->middleware("auth");
Route::get('/peliculas/{peliculas}/cancelar',[RentController::class, 'destroy'])
->middleware("auth");







