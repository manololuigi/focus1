<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\OtroEnvioController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\subCategoriaController;
use App\Http\Controllers\SearchController;
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
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/formenvio', function () {
    return view('formenvio');
})->name('formenvio');

/* Route::get('/otro', function () {
    return view('otro');
})->name('otro');
 */
/* Route::get('/', function () {
    return view('prueba');
})->name('prueba'); */

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
Route::resource('clients', ClientController::class);

Route::any('search', SearchController::class)->name('search');

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */
Route::resource('envio', OtroEnvioController::class);

//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('envios', EnvioController::class);
    Route::resource('productos', ProductController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('subcategorias', subCategoriaController::class);
    /* Route::resource('envios', EnvioController::class); */
});
