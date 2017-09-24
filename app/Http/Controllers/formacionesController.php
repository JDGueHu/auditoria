<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Formacion;
use App\AreaEstudio;
use App\NivelEstudio;
use App\Empleado;

class formacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formaciones = Formacion::where('alive',true)->get();

        return view('administracion.formaciones.index')
            ->with('formaciones',$formaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areasformacion = AreaEstudio::where('alive',true)->pluck('areaEstudio','id');
        $nivelesFormacion = NivelEstudio::where('alive',true)->orderby('orden')->pluck('nivelEstudio','id');
        $empleados = DB::table('empleados')
            ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
            ->where('empleados.alive',true)
            ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
            ->get();

        return view('administracion.formaciones.create')
            ->with('areasformacion',$areasformacion)
            ->with('nivelesFormacion',$nivelesFormacion)
            ->with('empleados',$empleados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function nivelFormacionAjax()
    {
        $response = NivelEstudio::where('alive',true)->get();

        return response($response);
    }

    public function crearFormacionAjax(Request $request)
    {
        if($request->ajax()){   

            $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

            $formacion = new Formacion();

            $formacion->empleado_id = $empleado[0]->id;
            $formacion->tipoEstudio = $request->tipoEstudio; 
            $formacion->intExt = $request->intExt; 
            $formacion->nivelEstudio_id = $request->nivelEstudio_id; 
            $formacion->areaEstudio_id = $request->areaEstudio_id; 
            $formacion->titulacion = $request->titulacion; 
            $formacion->estado = $request->estado; 
            $formacion->institucionEducativa = $request->institucionEducativa; 
            $formacion->fechaInicio = $request->fechaInicio; 
            $formacion->fechaFin = $request->fechaFin; 
            $formacion->ciudadEstudio = $request->ciudadNacimiento; 
            //$formacion->save();


            return response()->json($formacion);

        }
    }
}
