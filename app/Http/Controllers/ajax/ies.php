<?php

use App\Campus_Curso;
use Illuminate\Http\Request;

Class ies extends Controller {

	public function __construct(){
		parent:: __construct();
	}


public function getIES(Resquest $resquest){

	$response = array(
          'status' => 'success',
          'msg' => 'Olá',
      );

		return response()->json($response); 

}



}