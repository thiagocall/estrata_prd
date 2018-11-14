<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instituicao;
use App\Regional;


class RelatorioController extends Controller
{
	//Relatório Professores P1


	Public function Busca(){


		/*
		$dados = Campus::get();
		//return view('Relatorios.busca', ['dados' => $dados]);
		return ($dados);
		*/

		$regional = Regional::where('REGIONAL', 'NOT LIKE', 'INEXISTENTE')
							->distinct('REGIONAL')
							->SELECT('REGIONAL')
							->ORDERBY('REGIONAL')
							->get();

		$ies = Instituicao::get();



		return view('Relatorios.busca', ['regional' => $regional , 'ies' => $ies, 'teste' => false]); //Teste de variável para altereção de classe no menu dropdown
		//return ($regional);



	}




}
