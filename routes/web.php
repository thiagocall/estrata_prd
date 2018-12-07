<?php

use App\Professores;
use App\http\ProfessoresController;
use App\http\AtuacaoController;
use App\http\RelatorioController;

//Força registro para acesso às rotas
Auth::routes(['register' => true]);


Route::get('/', function () {
    return view('welcome');
});

//Rotas Atuação #########################
Route::get('atuacao', ['as'=>'inicial', 'uses' => 'AtuacaoController@inicial']);
Route::get('atuacao_', ['as'=>'inicial_', 'uses' => 'AtuacaoController@inicial_'])->middleware('auth');
Route::post('getIES',['as'=>'getIES', 'uses' => 'AtuacaoController@getIES']);
Route::post('getCampus',['as'=>'getCampus', 'uses' => 'AtuacaoController@getCampus']);
Route::post('getCurso',['as'=>'getCurso', 'uses' => 'AtuacaoController@getCurso']);
Route::post('getTurno',['as'=>'getTurno', 'uses' => 'AtuacaoController@getTurno']);




//Rotas Professores ########################
Route::get('inicial', ['as'=>'dashboards', 'uses' => 'ProfessoresController@dashboards']);
Route::get('listaprofessor',['as'=>'inicial', 'uses' => 'ProfessoresController@inicial']);
Route::get('mostrar/{cpf_}',['as'=>'mostrar', 'uses' => 'ProfessoresController@mostrar']);
Route::post('getCampus_IES',['as'=>'getCampus_IES', 'uses' => 'ProfessoresController@getCampus_IES']);
Route::post('getIES_Reg',['as'=>'getIES_Reg', 'uses' => 'ProfessoresController@getIES_Reg']);
Route::get('detalhePDF/{cpf}',['as'=>'detalhePDF', 'uses' => 'ProfessoresController@detalhePDF']);
Route::post('lista_professor',['as'=>'lista_professor2', 'uses' => 'ProfessoresController@lista_professor2']);
//Route::get('/home', ['as' => 'home' ,'uses' => 'ProfessoresController@dashboards']);
//Outra maneira de utilizar rotas
$this->get('/home', 'ProfessoresController@dashboards')->name('home');
Route::get('/buscaProfessor',['as'=>'buscaProfessor', 'uses' => 'ProfessoresController@BuscaProfessor'])->middleware('auth');
Route::post('/resumoPorCampus',['as'=>'resumoPorCampus', 'uses' => 'ProfessoresController@ResumoPorCampus'])->middleware('auth');




//Rotas de Relatórios ###########################
Route::post('/buscaProfessor_', 'RelatorioController@BuscaProfessor')->name('buscaProfessor2')->middleware('auth');
Route::get('/buscaPorCampus','RelatorioController@BuscaPorCampus')->name('buscaPorCampus')->middleware('auth');
Route::get('/busca',['as'=>'Busca', 'uses' => 'RelatorioController@Busca'])->middleware('auth');
Route::get('exportToFile/{id_campus}/{type_file}', ['as' => 'exportToFile' ,'uses' => 'RelatorioController@ExportToFile']);
Route::get('/buscaProfessor/{matricula}', 'RelatorioController@VerProfessor');


//838917496
