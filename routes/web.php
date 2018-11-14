<?php

use App\Professores;
use Illuminate\Support\Facades\DB;
use App\http\ProfessoresController;
use App\http\AtuacaoController;
use App\http\RelatorioController;

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

Route::get('inicial',function (){

    return view('Professores.index', ['title' => 'Professores', 'teste' => true]);

});

Route::get('listaprofessor','ProfessoresController@inicial');

Route::get('mostrar/{id}','ProfessoresController@mostrar');

Route::get('atuacao', 'AtuacaoController@inicial');

Route::get('atuacao_', 'AtuacaoController@inicial_')->middleware('auth');

Route::post('getIES','AtuacaoController@getIES');

Route::post('getCampus','AtuacaoController@getCampus');

Route::post('getCurso','AtuacaoController@getCurso');

Route::post('getTurno','AtuacaoController@getTurno');

Route::get('/busca','RelatorioController@Busca')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
