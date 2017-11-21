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
	    		"empleados" => "empleados,identificacion",
	    		"roles_responsabilidades" => "roles_matriz,rol",
	    	];

	    	$tabla = "";
	    	$campo = "";
	    	$resultado;

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

    public function validar_duplicado_backend($tipo_error,$ruta,$modulo,$dato)
    {
    	
    	if($tipo_error === '23000'){ //Validacion de error por duplicidad de registro
            flash('Ya existe el registro <b>'.$dato.'</b> en el módulo <b>'.$modulo.'</b>','danger')->important();
        }else{
        	flash('Ha ocurrido un error al procesar su solicitud en el sistema, por favor comuníquese con su proveedor','danger')->important();
        }
        
        return redirect()->route($ruta);
        
    }

}
