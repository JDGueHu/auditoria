<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class validarController extends Controller
{

    public function validar_duplicado(Request $request)
    {	

    	if($request->ajax()){   

	    	// Array de moodulos donde se indica la tabla y el campo para comparar duplicado
	    	$modulos = [
	    		"usuarios" => "users,email",
	    	];

	    	$tabla = "";
	    	$campo = "";
	    	$resultado = null;

	    	foreach ($modulos as $llave => $valor) {

	    		//Split para sacar los datos del array de modulos
	    		$datos = explode(",", $valor);

			    if($request->modulo == $llave){
			    	$tabla = $datos[0];
			    	$campo = $datos[1];
			    }
			    
			}

	    	$resultado= DB::table($tabla)
	            ->where($campo,'=', $request->dato)->get();

	       	if (count($resultado) == 0) {
	       		// Registro nuevo
			    $resultado= 0;
			}else{
	       		// Registro duplicado
			    $resultado= 1;				
			}

	    	return response($resultado);

        }
    }

}
