<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Contrato;
use App\Empleado;
use App\TipoContrato;

class contratosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::where('alive',true)->get();

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

    }


    public function createAjax(Request $request)
    {
        if($request->ajax()){   

            $contrato = new Contrato();

            $contrato->empleado_id = $request->empleado_id;
            $contrato->tipoContrato_id = $request->tipoContrato; 
            $contrato->fechaInicio = $request->fechaInicio; 
            $contrato->duracion = $request->duracion; 
            $contrato->fechaFin = $request->fechaFin; 
            $contrato->detalles = $request->detalles; 
            $contrato->estado = $request->estadContrato; 
            $contrato->save();

            $contrato = DB::table('contratos')
                ->join('tiposContrato','contratos.tipoContrato_id','=','tiposContrato.id')
                ->where('contratos.id','=',$contrato->id)
                ->where('tiposContrato.alive',true)
                ->select('contratos.id','tiposContrato.tipoContrato','contratos.fechaInicio','contratos.duracion','contratos.fechaFin','contratos.detalles','contratos.estado')
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

}
