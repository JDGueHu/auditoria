<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Examen;
use App\Empleado;
use App\RestriccionMedica;

class examenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examenes = Examen::where('alive',true)->get();

        return view('administracion.examenes.index')
            ->with('examenes',$examenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.alive',true)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        $tmp = uniqid();

        return view('administracion.examenes.create')
            ->with('empleados',$empleados)
            ->with('tmp',$tmp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examen = new Examen();
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $examen->empleado_id = $empleado[0]->id;
        $examen->tipoExamen = $request->tipoExamen;
        $examen->fechaExamen = $request->fechaExamen;
        $examen->concepto = $request->concepto;
        $examen->save();

        DB::table('restriccionesMedicas')
            ->where('id_examen','=', $request->tmp)
            ->update(['id_examen' => $examen->id]);

        flash('Examen de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('examenes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examen = Examen::find($id);
        $restricciones = RestriccionMedica::where('id_examen','=',$examen->id)->where('alive',true)->get();
        $empleado = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.id','=',$examen->empleado_id)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        return view('administracion.examenes.show')
            ->with('empleado',$empleado)
            ->with('examen',$examen)
            ->with('restricciones',$restricciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = Examen::find($id);
        $restricciones = RestriccionMedica::where('id_examen','=',$examen->id)->where('alive',true)->get();
        $empleado = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.id','=',$examen->empleado_id)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        $tmp = uniqid();

        return view('administracion.examenes.edit')
            ->with('empleado',$empleado)
            ->with('examen',$examen)
            ->with('restricciones',$restricciones)
            ->with('tmp',$tmp);
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
        $examen = Examen::find($id);
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $examen->empleado_id = $empleado[0]->id;
        $examen->tipoExamen = $request->tipoExamen;
        $examen->fechaExamen = $request->fechaExamen;
        $examen->concepto = $request->concepto;
        $examen->save();

        DB::table('restriccionesMedicas')
            ->where('id_examen','=', $request->tmp)
            ->update(['id_examen' => $examen->id]);

        flash('Examen de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('examenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examen = Examen::find($id);
        $empleado = Empleado::where('id','=',$examen->empleado_id)->get();

        $examen->alive = false;
        $examen->save();

        flash('Examen de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('examenes.index');
    }
}
