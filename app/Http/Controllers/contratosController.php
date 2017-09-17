<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Contrato;

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
        //
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

        $contrato = DB::table('contratos')
            ->join('tiposContrato','contratos.tipoContrato_id','=','tiposContrato.id')
            ->where('contratos.id','=',$id)
            ->where('tiposContrato.alive',true)
            ->select('contratos.id','tiposContrato.id as idTipo','contratos.fechaInicio','contratos.duracion','contratos.fechaFin','contratos.detalles','contratos.estado')
            ->get();

        return $contrato;
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
        $contrato = Contrato::find($id);

        $contrato->alive=false;
        $contrato->save();

        return response($id);
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

}
