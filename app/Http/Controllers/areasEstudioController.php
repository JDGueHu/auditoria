<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaEstudio;

class areasEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areasEstudio = AreaEstudio::get();

        return view('configuracion.areasEstudio.index')
            ->with('areasEstudio',$areasEstudio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.areasEstudio.create');
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

            $areaEstudio = new AreaEstudio();

            $areaEstudio->codigo = $request->codigo;
            $areaEstudio->areaEstudio = strtoupper($request->areaEstudio); //Pasar a mayúsculas
            $areaEstudio->save();

            flash('Área de formación <b>'.$areaEstudio->areaEstudio.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('areasEstudio.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'areasEstudio.index','modulo' => 'Áreas de formación','dato' => strtoupper($request->areaEstudio)]);
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
        $areaEstudio = AreaEstudio::find($id);

        return view('configuracion.areasEstudio.show')
            ->with('areaEstudio',$areaEstudio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areaEstudio = AreaEstudio::find($id);

        return view('configuracion.areasEstudio.edit')
            ->with('areaEstudio',$areaEstudio);
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
        $areaEstudio = AreaEstudio::find($id);

        $areaEstudio->codigo = $request->codigo;
        $areaEstudio->areaEstudio = strtoupper($request->areaEstudio);
        $areaEstudio->save();

        flash('Área de formación <b>'.$areaEstudio->areaEstudio.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('areasEstudio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areaEstudio = AreaEstudio::find($id);

        $areaEstudio->alive = false;
        $areaEstudio->save();

        flash('Área de formación <b>'.$areaEstudio->areaEstudio.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('areasEstudio.index');
    }

    public function activar($id)
    {
        $areaEstudio = AreaEstudio::find($id);

        $areaEstudio->alive = true;
        $areaEstudio->save();

        flash('Área de formación <b>'.$areaEstudio->areaEstudio.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('areasEstudio.index');
    }
}
