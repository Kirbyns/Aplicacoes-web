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

Route::get('/avisos',function(){
    return view('avisos', ['nome' => 'Matheus', 'mostrar' => true,
    'avisos' =>[ ['id'=>1, 'aviso'=>'teste 1'],
                 ['id'=>2, 'aviso'=>'teste 2'],
                 ['id'=>3, 'aviso'=>'teste 3']]]);
});

Route::get('/exercicio',function(){
    return view('exercicio', ['textos' =>[
        ['id'=>1, 'texto'=>'teste 1'],
        ['id'=>2, 'texto'=>'teste 2'],
        ['id'=>3, 'texto'=>'teste 3']], 'mostrar'=> true, 'naomostra'=> false]);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('clientes')->group(function(){

    Route::get('/listar',[App\Http\Controllers\ClientesController::class, 'listar'])->middleware('auth');

});
