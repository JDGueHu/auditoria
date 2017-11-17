<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ARL;

class arlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arls = ARL::get();

        return view('configuracion.arl.index')
            ->with('arls',$arls);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.arl.create');
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

            $arl = new ARL();

            $arl->codigo = $request->codigo;
            $arl->arl = strtoupper($request->arl);
            $arl->save();

            flash('ARL <b>'.$arl->arl.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('arl.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'arl.index','modulo' => 'ARL','dato' => strtoupper($request->arl)]);
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
        $arl = ARL::find($id);

        return view('configuracion.arl.show')->with('arl',$arl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arl = ARL::find($id);

        return view('configuracion.arl.edit')->with('arl',$arl);
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
        $arl = ARL::find($id);

        $arl->codigo = $request->codigo;
        $arl->arl = strtoupper($request->arl);
        $arl->save();

        flash('ARL <b>'.$arl->arl.'</b> se edito exitosamente', 'warning')->important();
        return redirect()->route('arl.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arl = ARL::find($id);

        $arl->alive = false;
        $arl->save();

        flash('ARL <b>'.$arl->arl.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('arl.index');
    }

    public function activar($id)
    {
        $arl = ARL::find($id);

        $arl->alive = true;
        $arl->save();

        flash('ARL <b>'.$arl->arl.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('arl.index');
    }
}
