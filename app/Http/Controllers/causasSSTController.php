<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CausaSST;

class causasSSTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causasSST = CausaSST::where('alive',true)->get();

        return view('configuracion.causasSST.index')
            ->with('causasSST',$causasSST);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.causasSST.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $causaSST = new CausaSST();

        $causaSST->codigo = $request->codigo;
        $causaSST->causa = $request->causa;
        $causaSST->principal = $request->principal == 'value' ? true : false;
        $causaSST->save();

        flash('Causa SST <b>'.$causaSST->causa.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('causasSST.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $causaSST = CausaSST::find($id);

        return view('configuracion.causasSST.show')
            ->with('causaSST',$causaSST);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $causaSST = CausaSST::find($id);

        return view('configuracion.causasSST.edit')
            ->with('causaSST',$causaSST);
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
        $causaSST = CausaSST::find($id);

        $causaSST->codigo = $request->codigo;
        $causaSST->causa = $request->causa;
        $causaSST->principal = $request->principal == 'value' ? true : false;
        $causaSST->save();

        flash('Causa SST <b>'.$causaSST->causa.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('causasSST.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $causaSST = CausaSST::find($id);

        $causaSST->alive = false;
        $causaSST->save();

        flash('Causa SST <b>'.$causaSST->causa.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('causasSST.index');
    }
}
