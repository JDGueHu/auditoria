<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Adjunto extends Model
{
	protected $table = "adjuntos";

	public function Empleado()
    {
        return $this->belongsTo('App\Empleado','empleado_id');
    }

    public static function adjuntar(Request $request,$table, $nombre, $idRegistro){

	    // Para cargar archivo
        $fecha = Carbon::now(-5)->toDateTimeString(); // Convertir a string fecha
        $fecha = str_replace ( " ", "_" , $fecha ); // Quitar espacios por guines bajos
        $fecha = str_replace ( ":", "-" , $fecha ); // Quitar dos puntos por guines

        $name = $nombre.'.'.$fecha.'_'.$request->adjunto->getClientOriginalName(); 
        
        $request->adjunto->storeAs('public',$name); // subir el archivo a la carpeta linkeada

    	DB::table($table)
            ->where('id', $idRegistro)
            ->update(['adjunto' => '/calidad/public/storage/'.$name]);

    }
}
