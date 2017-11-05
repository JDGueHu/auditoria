<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoRequisitoLegal;

class tipoRequisitoLegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposRequisitos = TipoRequisitoLegal::where('alive',true)->get();

        return view('configuracion.tiposRequisitosLegales.index')
            ->with('tiposRequisitos',$tiposRequisitos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tiposRequisitosLegales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoRequisito = new TipoRequisitoLegal();

        $tipoRequisito->codigo = $request->codigo;
        $tipoRequisito->tipo_requisito_legal = $request->tipo_requisito_legal;
        $tipoRequisito->save();

        flash('Tipo de requisito legal <b>'.$tipoRequisito->tipo_requisito_legal.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('tipoRequisitoLegal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoRequisito = TipoRequisitoLegal::find($id);

        return view('configuracion.tiposRequisitosLegales.show')
            ->with('tipoRequisito',$tipoRequisito);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoRequisito = TipoRequisitoLegal::find($id);

        return view('configuracion.tiposRequisitosLegales.edit')
            ->with('tipoRequisito',$tipoRequisito);
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
        $tipoRequisito = TipoRequisitoLegal::find($id);

        $tipoRequisito->codigo = $request->codigo;
        $tipoRequisito->tipo_requisito_legal = $request->tipo_requisito_legal;
        $tipoRequisito->save();

        flash('Tipo de requisito legal <b>'.$tipoRequisito->tipo_requisito_legal.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('tipoRequisitoLegal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoRequisito = TipoRequisitoLegal::find($id);

        $tipoRequisito->alive = false;
        $tipoRequisito->save();

        flash('Tipo de requisito legal <b>'.$tipoRequisito->tipo_requisito_legal.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('tipoRequisitoLegal.index');
    }
}
