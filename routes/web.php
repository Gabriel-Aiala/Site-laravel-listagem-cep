<?php
use App\Http\Controllers\enderecoController;
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

Route::get('/',[enderecoController::class,'index'])->name('home');
Route::get('/adicionar',[enderecoController::class,'adicionar'])->name('adicionar');
Route::get('/buscar',[enderecoController::class,'buscar'])->name('buscar');
Route::post('/salvar',[enderecoController::class,'salvar'])->name('salvar');
Route::delete('/{id}',[enderecoController::class,'deletar'])->name('deletar');
