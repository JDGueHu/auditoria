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
        $areasformacion = AreaEstudio::where('alive',true)->pluck('areaEstudio','id');
        $nivelesFormacion = NivelEstudio::where('alive',true)->orderby('orden')->pluck('nivelEstudio','id');

        $formacion = DB::table('formaciones')
        ->join('empleados','formaciones.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->join('nivelesEstudio','formaciones.nivelEstudio_id','=','nivelesEstudio.id')
        ->join('areasEstudio','formaciones.areaEstudio_id','=','areasEstudio.id')
        ->where('formaciones.alive',true)
        ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','nivelesEstudio.id as nivelEstudio','formaciones.*')
        ->get();

        return view('administracion.formaciones.show')
            ->with('formacion',$formacion)
            ->with('areasformacion',$areasformacion)
            ->with('nivelesFormacion',$nivelesFormacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areasformacion = AreaEstudio::where('alive',true)->pluck('areaEstudio','id');
        $nivelesFormacion = NivelEstudio::where('alive',true)->orderby('orden')->pluck('nivelEstudio','id');

        $formacion = DB::table('formaciones')
        ->join('empleados','formaciones.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->join('nivelesEstudio','formaciones.nivelEstudio_id','=','nivelesEstudio.id')
        ->join('areasEstudio','formaciones.areaEstudio_id','=','areasEstudio.id')
        ->where('formaciones.alive',true)
        ->select('empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','nivelesEstudio.id as nivelEstudio','formaciones.*')
        ->get();

        return view('administracion.formaciones.edit')
            ->with('formacion',$formacion)
            ->with('areasformacion',$areasformacion)
            ->with('nivelesFormacion',$nivelesFormacion);
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
            $formacion = Formacion::find($id);
            $empleado = Empleado::find($request->empleado_id);
            
            //dd($request);
            $formacion->empleado_id = $empleado->id;
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
            $formacion->save();

        flash('Formación de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('formaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formacion = Formacion::find($id);
        $empleado = Empleado::find($formacion->empleado_id);

        $formacion->alive = false;
        $formacion->save();

        flash('Formacion de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('formaciones.index');
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
            $formacion->save();


            return response()->json($formacion);

        }
    }

    public function showAjax($id)
    {

        $formaciones = DB::table('formaciones')
        ->join('nivelesEstudio','formaciones.nivelEstudio_id','=','nivelesEstudio.id')
        ->join('areasEstudio','formaciones.areaEstudio_id','=','areasEstudio.id')
        ->where('formaciones.alive',true)
        ->select('areasEstudio.id as areasEstudio', 'nivelesEstudio.id as nivelEstudio','formaciones.*')
        ->get();

        return $formaciones;
    }
}
