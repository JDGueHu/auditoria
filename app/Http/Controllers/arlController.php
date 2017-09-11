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
        $arls = ARL::where('alive',true)->get();

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
        $arl = new ARL();

        $arl->codigo = $request->codigo;
        $arl->arl = $request->arl;
        $arl->save();

        flash('ARL <b>'.$arl->arl.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('arl.index');
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
        $arl->arl = $request->arl;
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

        flash('ARL <b>'.$arl->arl.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('arl.index');
    }
}
