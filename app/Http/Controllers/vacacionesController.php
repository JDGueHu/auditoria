<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vacacion;
use App\TipoVacaciones;
use App\Empleado;
use App\Adjunto;

class vacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ausentismos = Vacacion::get();

        return view('administracion.vacaciones.index')
            ->with('ausentismos',$ausentismos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tiposAusentismo = TipoVacaciones::where('alive',true)->pluck('tipoVacaciones','id');
        $empleados = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.alive',true)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        return view('administracion.vacaciones.create')
            ->with('tiposAusentismo',$tiposAusentismo)
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
        $ausentismo = new Vacacion();
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $ausentismo->empleado_id = $empleado[0]->id;
        $ausentismo->tipoVacaciones_id = $request->tipoVacacion;
        $ausentismo->fechaInicio = $request->fechaInicioAusentismo;
        $ausentismo->fechaFin = $request->fechaFinAusentismo;
        $ausentismo->detalles = $request->detallesAusentismo;
        $ausentismo->save();

        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'vacaciones', 'vacacionesModulo', $ausentismo->id);
        }

        flash('Ausentismo de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('vacaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tiposAusentismo = TipoVacaciones::where('alive',true)->pluck('tipoVacaciones','id');
        $ausentismo = DB::table('vacaciones')
        ->join('empleados','vacaciones.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('vacaciones.alive',true)
        ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','vacaciones.*')
        ->get();

        return view('administracion.vacaciones.show')
            ->with('tiposAusentismo',$tiposAusentismo)
            ->with('ausentismo',$ausentismo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiposAusentismo = TipoVacaciones::where('alive',true)->pluck('tipoVacaciones','id');
        $ausentismo = DB::table('vacaciones')
        ->join('empleados','vacaciones.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('vacaciones.alive',true)
        ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','vacaciones.*')
        ->get();

        return view('administracion.vacaciones.edit')
            ->with('tiposAusentismo',$tiposAusentismo)
            ->with('ausentismo',$ausentismo);
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
        $ausentismo = Vacacion::find($id);
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $ausentismo->empleado_id = $empleado[0]->id;
        $ausentismo->tipoVacaciones_id = $request->tipoVacacion;
        $ausentismo->fechaInicio = $request->fechaInicio;
        $ausentismo->fechaFin = $request->fechaFin;
        $ausentismo->detalles = $request->detalles;
        $ausentismo->save();

        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'vacaciones', 'vacacionesModulo', $ausentismo->id);
        }

        flash('Ausentismo de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('vacaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ausentismo = Vacacion::find($id);
        $empleado = Empleado::find($ausentismo->empleado_id);

        $ausentismo->alive = false;
        $ausentismo->save();

        flash('Ausentismo de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('vacaciones.index');
    }

    public function createAjax(Request $request)
    {
        if($request->ajax()){   

            $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

            $ausentismo = new Vacacion();

            $ausentismo->empleado_id = $empleado[0]->id;
            $ausentismo->tipoVacaciones_id = $request->tipoVacacion;
            $ausentismo->fechaInicio = $request->fechaInicioAusentismo;
            $ausentismo->fechaFin = $request->fechaFinAusentismo;
            $ausentismo->detalles = $request->detallesAusentismo;
            $ausentismo->save();

            if ($request->hasFile('adjunto')) {
                //Adjuntar archivo y asociarlo a registro creado
                Adjunto::adjuntar($request, 'vacaciones', 'vacacionesSubpanel', $ausentismo->id);
            }

            $ausentismo = DB::table('vacaciones')
                ->join('tiposVacaciones','vacaciones.tipoVacaciones_id','=','tiposVacaciones.id')
                ->where('vacaciones.id','=',$ausentismo->id)
                ->select('tiposVacaciones.tipoVacaciones','vacaciones.*')
                ->get();

            return response($ausentismo);

        }
    }

    public function showAjax($id)
    {

        $ausentismo = Vacacion::find($id);

        return $ausentismo;
    }

    public function destroyAjax($id)
    {
        $ausentismo = Vacacion::find($id);

        $ausentismo->alive=false;
        $ausentismo->save();

        return response($id);
    }

    public function activar($id)
    {
        $ausentismo = Vacacion::find($id);
        $empleado = Empleado::find($ausentismo->empleado_id);

        $ausentismo->alive = true;
        $ausentismo->save();

        flash('Ausentismo de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('vacaciones.index');
    }
}
