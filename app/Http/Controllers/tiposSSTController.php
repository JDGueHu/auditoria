<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoSST;

class tiposSSTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposSST = TipoSST::get();

        return view('configuracion.tiposSST.index')
            ->with('tiposSST',$tiposSST);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.tiposSST.create');
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

            $tipoSST = new TipoSST();

            $tipoSST->codigo = $request->codigo;
            $tipoSST->tipoSST = strtoupper($request->tipoSST);
            $tipoSST->save();


            flash('Tipo de SST <b>'.$tipoSST->tipoSST.'</b> se creó exitosamente', 'success')->important();
            return redirect()->route('tiposSST.index');

        }catch(\Exception $e){
            return redirect()->route('validar_duplicado_backend',['tipo_error' => $e->errorInfo[0],'ruta' => 'tiposSST.index','modulo' => 'Tipos de SST','dato' => strtoupper($request->tipoSST)]);
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
        $tipoSST = TipoSST::find($id);

        return view('configuracion.tiposSST.show')
            ->with('tipoSST',$tipoSST);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoSST = TipoSST::find($id);

        return view('configuracion.tiposSST.edit')
            ->with('tipoSST',$tipoSST);
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
        $tipoSST = TipoSST::find($id);

        $tipoSST->codigo = $request->codigo;
        $tipoSST->tipoSST = strtoupper($request->tipoSST);
        $tipoSST->save();


        flash('Tipo de SST <b>'.$tipoSST->tipoSST.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('tiposSST.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoSST = TipoSST::find($id);

        $tipoSST->alive = false;
        $tipoSST->save();


        flash('Tipo de SST <b>'.$tipoSST->tipoSST.'</b> se inactivó exitosamente', 'danger')->important();
        return redirect()->route('tiposSST.index');
    }

    public function activar($id)
    {
        $tipoSST = TipoSST::find($id);

        $tipoSST->alive = true;
        $tipoSST->save();

        flash('Tipo de SST <b>'.$tipoSST->tipoSST.'</b> se activó exitosamente', 'success')->important();
        return redirect()->route('tiposSST.index');
    }
}
