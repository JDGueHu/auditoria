<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoContrato;


class tiposContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposContrato = TipoContrato::get();
        return view('configuracion.tiposContrato.index')->with('tiposContrato',$tiposContrato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tiposContrato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            
            $tipoContrato = new TipoContrato();

            $tipoContrato->codigo = $request->codigo;
            $tipoContrato->tipoContrato = strtoupper($request->tipoContrato);
            $tipoContrato->terminoIndefinido = $request->terminoIndefinido == 'value' ? true : false;
            $tipoContrato->save();

            flash('Tipo de contrato <b>'.$tipoContrato->tipoContrato.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('tiposContrato.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'tiposContrato.index','modulo' => 'Tipos de contrato','dato' => strtoupper($request->tipoContrato)]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoContrato = TipoContrato::find($id);

        return view('configuracion.tiposContrato.show')->with("tipoContrato",$tipoContrato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoContrato = TipoContrato::find($id);

        return view('configuracion.tiposContrato.edit')->with("tipoContrato",$tipoContrato);
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
        $tipoContrato = TipoContrato::find($id);

        $tipoContrato->codigo = $request->codigo;
        $tipoContrato->tipoContrato = strtoupper($request->tipoContrato);
        $tipoContrato->terminoIndefinido = $request->terminoIndefinido == 'value' ? true : false;
        $tipoContrato->save();

        flash('Tipo de contrato <b>'.$tipoContrato->tipoContrato.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('tiposContrato.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoContrato = TipoContrato::find($id);

        $tipoContrato->alive = false;
        $tipoContrato->save();

        flash('Tipo de contrato <b>'.$tipoContrato->tipoContrato.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('tiposContrato.index');
    }

    public function indefinido($id)
    {
        $tipoContrato = TipoContrato::find($id);

        return $tipoContrato->terminoIndefinido;
    }

    public function activar($id)
    {
        $tipoContrato = TipoContrato::find($id);

        $tipoContrato->alive = true;
        $tipoContrato->save();

        flash('Tipo de contrato <b>'.$tipoContrato->tipoContrato.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('tiposContrato.index');
    }
}
