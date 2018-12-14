<?php

use App\Professores;
use App\http\ProfessoresController;
use App\http\AtuacaoController;
use App\http\RelatorioController;

//Força registro para acesso às rotas

Auth::routes();


Route::get('/', function () {
    return view('welcome');
});
//Rotas Atuação #########################
Route::middleware('auth')->name('Atuacao')->group(function() {

			Route::get('atuacao', ['as'=>'inicial', 'uses' => 'AtuacaoController@inicial']);
			Route::get('atuacao_', ['as'=>'inicial_', 'uses' => 'AtuacaoController@inicial_']);
			Route::post('getIES',['as'=>'getIES', 'uses' => 'AtuacaoController@getIES']);
			Route::post('getCampus',['as'=>'getCampus', 'uses' => 'AtuacaoController@getCampus']);
			Route::post('getCurso',['as'=>'getCurso', 'uses' => 'AtuacaoController@getCurso']);
			Route::post('getTurno',['as'=>'getTurno', 'uses' => 'AtuacaoController@getTurno']);

});

Route::get('inicial', ['as'=>'dashboards', 'uses' => 'ProfessoresController@dashboards']);

Route::prefix('Consultas')->middleware('auth')->name('Professores.')->group(function() {
//Rotas Professores ########################

			Route::get('listaprofessor',['as'=>'inicial', 'uses' => 'ProfessoresController@inicial']);
			Route::get('mostrar/{cpf_}',['as'=>'mostrar', 'uses' => 'ProfessoresController@mostrar']);
			Route::post('getCampus_IES',['as'=>'getCampus_IES', 'uses' => 'ProfessoresController@getCampus_IES']);
			Route::post('getIES_Reg',['as'=>'getIES_Reg', 'uses' => 'ProfessoresController@getIES_Reg']);
			Route::get('detalhePDF/{cpf}',['as'=>'detalhePDF', 'uses' => 'ProfessoresController@detalhePDF']);
			Route::post('lista_professor',['as'=>'lista_professor2', 'uses' => 'ProfessoresController@lista_professor2']);
			//Route::get('/home', ['as' => 'home' ,'uses' => 'ProfessoresController@dashboards']);
			//Outra maneira de utilizar rotas
			$this->get('/home', 'ProfessoresController@dashboards')->name('home');
			Route::get('/buscaProfessor',['as'=>'buscaProfessor', 'uses' => 'ProfessoresController@BuscaProfessor']);
			Route::post('/resumoPorCampus',['as'=>'resumoPorCampus', 'uses' => 'ProfessoresController@ResumoPorCampus']);

});

Route::middleware('auth')->name('Consulta.')->group(function() {
//Rotas de Relatórios ###########################

			Route::post('/buscaProfessor_', 'RelatorioController@BuscaProfessor')->name('buscaProfessor2');
			Route::get('/buscaPorCampus','RelatorioController@BuscaPorCampus')->name('buscaPorCampus');
			Route::get('/busca',['as'=>'Busca', 'uses' => 'RelatorioController@Busca']);
			Route::get('exportToFile/{id_campus}/{type_file}', ['as' => 'exportToFile' ,'uses' => 'RelatorioController@ExportToFile']);
			Route::get('/buscaProfessor/{matricula}', 'RelatorioController@VerProfessor');

});


Route::prefix('CargaHoraria')->middleware('auth')->name('CargaHoraria.')->group(function() {
//Rotas de Relatórios ###########################

			Route::get('/buscaProfessor/{matricula}', 'RelatorioController@VerProfessor');
			Route::get('/buscaProfessor',['as'=>'buscaProfessor', 'uses' => 'ProfessoresController@BuscaProfessor']);

});

//838917496
