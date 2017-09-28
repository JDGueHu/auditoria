<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SST;
use App\TipoSST;
use App\Empleado;
use App\causaSSt;

class SSTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SSTs = SST::where('alive',true)->get();

        return view('administracion.SSTs.index')
            ->with('SSTs',$SSTs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoSST = TipoSST::where('alive',true)->pluck('tipoSST','id');
        $causasSSt_principales = causaSSt::where('alive',true)
            ->where('principal',true)
            ->pluck('causa','id');
        $causasSSt_complementarias = causaSSt::where('alive',true)
            ->where('principal',false)
            ->pluck('causa','id');


        $empleados = DB::table('empleados')
        ->join('tiposDocumento','empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('empleados.alive',true)
        ->select('tiposDocumento.tipoDocumento','empleados.identificacion','empleados.nombres','empleados.apellidos')
        ->get();

        return view('administracion.SSTs.create')
            ->with('tipoSST',$tipoSST)
            ->with('causasSSt_principales',$causasSSt_principales)
            ->with('causasSSt_complementarias',$causasSSt_complementarias)
            ->with('empleados',$empleados);
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
        //
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
        //
    }
}
