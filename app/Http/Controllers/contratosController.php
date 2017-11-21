<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Contrato;
use App\Empleado;
use App\TipoContrato;
use Carbon\Carbon;
use App\Adjunto;

class contratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::get();

        $contratos = DB::table('contratos')
            ->join('empleados','contratos.empleado_id','=','empleados.id')
            ->join('tiposContrato','contratos.tipoContrato_id','=','tiposContrato.id')
            ->select('empleados.nombres','empleados.apellidos','empleados.identificacion','contratos.*','tiposContrato.tipoContrato')
            ->get();

        return view('administracion.contratos.index')->with('contratos',$contratos);
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
        $tiposContrato = TipoContrato::where('alive',true)->pluck('tipoContrato','id');

        return view('administracion.contratos.create')
            ->with('empleados',$empleados)
            ->with('tiposContrato',$tiposContrato);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contrato = new Contrato();

        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $contrato->empleado_id = $empleado[0]->id;
        $contrato->tipoContrato_id = $request->tipoContrato;
        $contrato->fechaInicio = $request->fechaInicio;
        $contrato->duracion = $request->duracion;
        $contrato->fechaFin = $request->fechaFin;
        $contrato->detalles = $request->detalles;
        $contrato->estado = $request->estadContrato;
        $contrato->save();


        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'contratos', 'contratoModulo', $contrato->id);
        }

        //dd($contrato);

        flash('Contrato de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('contratos.index');
        //dd($empleado[0]->nombres);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $contrato = DB::table('contratos')
            ->join('empleados','contratos.empleado_id','=','empleados.id')
            ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
            ->where('contratos.id',$id)
            ->select('empleados.nombres','empleados.apellidos','empleados.identificacion','contratos.*','tiposDocumento.tipoDocumento')
            ->get();
        $tiposContrato = TipoContrato::where('alive',true)->pluck('tipoContrato','id');

        return view('administracion.contratos.show')
            ->with('contrato',$contrato)
            ->with('tiposContrato',$tiposContrato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = DB::table('contratos')
            ->join('empleados','contratos.empleado_id','=','empleados.id')
            ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
            ->where('contratos.id',$id)
            ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','empleados.identificacion','contratos.*','tiposDocumento.tipoDocumento')
            ->get();
        $tiposContrato = TipoContrato::where('alive',true)->pluck('tipoContrato','id');
//dd($contrato[0]);
        return view('administracion.contratos.edit')
            ->with('contrato',$contrato)
            ->with('tiposContrato',$tiposContrato);
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
        $contrato = Contrato::find($id);
        $empleado = Empleado::find($request->empleado_id);

        $contrato->empleado_id = $request->empleado_id;
        $contrato->tipoContrato_id = $request->tipoContrato;
        $contrato->fechaInicio = $request->fechaInicio;
        $contrato->duracion = $request->duracion;
        $contrato->fechaFin = $request->fechaFin;
        $contrato->detalles = $request->detalles;
        $contrato->estado = $request->estadContrato;
        $contrato->save();

        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'contratos', 'contratoModulo', $contrato->id);
        }

        flash('Contrato de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id);
        $empleado = Empleado::find($contrato->empleado_id);

        $contrato->alive = false;
        $contrato->save();

        flash('Contrato de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('contratos.index');
    }


    public function createAjax(Request $request)
    {

        if($request->ajax()){   

            $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

            $contrato = new Contrato();

            $contrato->empleado_id = $empleado[0]->id;
            $contrato->tipoContrato_id = $request->tipoContrato; 
            $contrato->fechaInicio = $request->fechaInicio; 
            $contrato->duracion = $request->duracion; 
            $contrato->fechaFin = $request->fechaFin; 
            $contrato->estado = $request->estado; 
            $contrato->detalles = $request->detalles;             
            $contrato->save();

            if ($request->hasFile('adjunto')) {
                //Adjuntar archivo y asociarlo a registro creado
                Adjunto::adjuntar($request, 'contratos', 'contratoSubpanel', $contrato->id);
            }

            $contrato = DB::table('contratos')
                ->join('tiposContrato','contratos.tipoContrato_id','=','tiposContrato.id')
                ->where('contratos.id','=',$contrato->id)
                ->where('tiposContrato.alive',true)
                ->select('contratos.id','tiposContrato.tipoContrato','contratos.fechaInicio','contratos.duracion','contratos.fechaFin','contratos.detalles','contratos.estado','contratos.adjunto')
                ->get();

            return response($contrato);
            //->json($contratos)
        }
    }

    public function destroyAjax($id)
    {
        $contrato = Contrato::find($id);

        $contrato->alive=false;
        $contrato->save();

        return response($id);
    }

    public function showAjax($id)
    {

        $contrato = DB::table('contratos')
            ->join('tiposContrato','contratos.tipoContrato_id','=','tiposContrato.id')
            ->where('contratos.id','=',$id)
            ->where('tiposContrato.alive',true)
            ->select('contratos.id','tiposContrato.id as idTipo','contratos.fechaInicio','contratos.duracion','contratos.fechaFin','contratos.detalles','contratos.estado')
            ->get();

        return $contrato;
    }

    public function activar($id)
    {
        $contrato = Contrato::find($id);
        $empleado = Empleado::find($contrato->empleado_id);

        $contrato->alive = true;
        $contrato->save();

        flash('Contrato de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('contratos.index');
    }

}
