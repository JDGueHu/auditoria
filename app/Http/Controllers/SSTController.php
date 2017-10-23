<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SST;
use App\TipoSST;
use App\Empleado;
use App\causaSSt;
use App\Adjunto;

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
        $SST = new SST();
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $SST->empleado_id = $empleado[0]->id;
        $SST->tipoSST_id = $request->tipoSST_id;
        $SST->fechaSST = $request->fechaSST;
        $SST->causaPrincipal_id = $request->causaPrincipal_id;
        $SST->causaComplementaria_id = $request->causaComplementaria_id;
        $SST->detalles = $request->detalles;
        $SST->save();

        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'sst', 'sstModulo', $SST->id);
        }

        flash('SST de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('SST.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoSST = TipoSST::where('alive',true)->pluck('tipoSST','id');
        $causasSSt_principales = causaSSt::where('alive',true)
            ->where('principal',true)
            ->pluck('causa','id');
        $causasSSt_complementarias = causaSSt::where('alive',true)
            ->where('principal',false)
            ->pluck('causa','id');
        $SST = DB::table('SST')
        ->join('empleados','SST.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('SST.alive',true)
        ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','SST.*')
        ->get();

        return view('administracion.SSTs.show')
            ->with('tipoSST',$tipoSST)
            ->with('causasSSt_principales',$causasSSt_principales)
            ->with('causasSSt_complementarias',$causasSSt_complementarias)
            ->with('SST',$SST);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoSST = TipoSST::where('alive',true)->pluck('tipoSST','id');
        $causasSSt_principales = causaSSt::where('alive',true)
            ->where('principal',true)
            ->pluck('causa','id');
        $causasSSt_complementarias = causaSSt::where('alive',true)
            ->where('principal',false)
            ->pluck('causa','id');
        $SST = DB::table('SST')
        ->join('empleados','SST.empleado_id','=','empleados.id')
        ->join('tiposDocumento', 'empleados.tipoDocumento_id','=','tiposDocumento.id')
        ->where('SST.alive',true)
        ->select('empleados.id as empleado_id','empleados.nombres','empleados.apellidos','tiposDocumento.tipoDocumento', 'empleados.identificacion','SST.*')
        ->get();

        return view('administracion.SSTs.edit')
            ->with('tipoSST',$tipoSST)
            ->with('causasSSt_principales',$causasSSt_principales)
            ->with('causasSSt_complementarias',$causasSSt_complementarias)
            ->with('SST',$SST);
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
        $SST = SST::find($id);
        $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

        $SST->empleado_id = $empleado[0]->id;
        $SST->tipoSST_id = $request->tipoSST_id;
        $SST->fechaSST = $request->fechaSST;
        $SST->causaPrincipal_id = $request->causaPrincipal_id;
        $SST->causaComplementaria_id = $request->causaComplementaria_id;
        $SST->detalles = $request->detalles;
        $SST->save();

        if ($request->hasFile('adjunto')) {
            //Adjuntar archivo y asociarlo a registro creado
            Adjunto::adjuntar($request, 'sst', 'sstModulo', $SST->id);
        }

        flash('SST de <b>'.$empleado[0]->nombres.' '.$empleado[0]->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('SST.index');
    }

    public function destroy($id)
    {
        $SST = SST::find($id);
        $empleado = Empleado::find($SST->empleado_id);

        $SST->alive = false;
        $SST->save();

        flash('SST de <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('SST.index');
    }

    public function createAjax(Request $request)
    {

        if($request->ajax()){   

            $SST = new SST();
            $empleado = Empleado::where('identificacion','=',$request->identificacion)->get();

            $SST->empleado_id = $empleado[0]->id;
            $SST->tipoSST_id = $request->tipoSST_id;
            $SST->fechaSST = $request->fechaSST;
            $SST->causaPrincipal_id = $request->causaPrincipal_id;
            $SST->causaComplementaria_id = $request->causaComplementaria_id;
            $SST->detalles = $request->detallesSST;
            $SST->save();

            if ($request->hasFile('adjunto')) {
                //Adjuntar archivo y asociarlo a registro creado
                Adjunto::adjuntar($request, 'sst', 'sstSubpanel', $SST->id);
            }

            $SST = DB::table('sst')
                ->join('tiposSST','sst.tipoSST_id','=','tiposSST.id')
                ->where('sst.id','=',$SST->id)
                ->where('sst.alive',true)
                ->select('tiposSST.tipoSST','sst.*')
                ->get();

            return response($SST);
            //->json($contratos)
        }
    }

    public function showAjax($id)
    {

        $SST = SST::find($id);

        return $SST;
    }

    public function destroyAjax($id)
    {
        $SST = SST::find($id);

        $SST->alive=false;
        $SST->save();

        return response($id);
    }
}
