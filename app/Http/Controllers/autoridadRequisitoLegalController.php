<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AutoridadRequisitoLegal;

class autoridadRequisitoLegalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposAutoridades = AutoridadRequisitoLegal::get();

        return view('configuracion.autoridadesRequisitosLegales.index')
            ->with('tiposAutoridades',$tiposAutoridades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.autoridadesRequisitosLegales.create');
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

            $autoridad = new AutoridadRequisitoLegal();

            $autoridad->codigo = $request->codigo;
            $autoridad->tipo_autoridad = strtoupper($request->tipo_autoridad);
            $autoridad->save();

            flash('Autoridad de requisito legal <b>'.$autoridad->tipo_autoridad.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('autoridadRequisitoLegal.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'autoridadRequisitoLegal.index','modulo' => 'Autoridades de requisitos legales','dato' => strtoupper($request->tipo_autoridad)]);
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
        $autoridad = AutoridadRequisitoLegal::find($id);

        return view('configuracion.autoridadesRequisitosLegales.show')
            ->with('autoridad',$autoridad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autoridad = AutoridadRequisitoLegal::find($id);

        return view('configuracion.autoridadesRequisitosLegales.edit')
            ->with('autoridad',$autoridad);
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
        $autoridad = AutoridadRequisitoLegal::find($id);

        $autoridad->codigo = $request->codigo;
        $autoridad->tipo_autoridad = strtoupper($request->tipo_autoridad);
        $autoridad->save();

        flash('Autoridad de requisito legal <b>'.$autoridad->tipo_autoridad.'</b> se modificó exitosamente', 'warning')->important();
        return redirect()->route('autoridadRequisitoLegal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $autoridad = AutoridadRequisitoLegal::find($id);

        $autoridad->alive = false;
        $autoridad->save();

        flash('Autoridad de requisito legal <b>'.$autoridad->tipo_autoridad.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('autoridadRequisitoLegal.index');
    }

    public function activar($id)
    {
        $autoridad = AutoridadRequisitoLegal::find($id);

        $autoridad->alive = true;
        $autoridad->save();

        flash('Autoridad de requisito legal <b>'.$autoridad->tipo_autoridad.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('autoridadRequisitoLegal.index');
    }
}
