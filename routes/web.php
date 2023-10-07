<?php

use App\Http\Controllers\CrudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [CrudController::class, "index"])->name("crudnuevo.index");
//RUTA PARA AÑADIR PRODUCTO
Route::post("/registrarProducto", [CrudController::class, "create"])->name("crudnuevo.create");
//RUTA PARA MODIFICAR PRODUCTO
Route::post("/modificarProducto", [CrudController::class, "update"])->name("crudnuevo.update");
//RUTA PARA ELIMINAR PRODUCTO
Route::get("/eliminarProducto-{id}", [CrudController::class, "delete"])->name("crudnuevo.delete");





