<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Empleado;
use App\TipoDocumento;
use App\Cargo;
use App\CentroTrabajo;
use App\EPS;
use App\ARL;
use App\FondosPensiones;
use App\FondosCesantias;
use App\NivelRiesgo;
use App\TipoContrato;
use App\Contrato;
use App\NivelEstudio;
use App\AreaEstudio;
use App\Formacion;
use App\Examen;
use App\Vacacion;
use App\TipoVacaciones;
use App\SST;
use App\TipoSST;
use App\causaSSt;
use App\Adjunto;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::where('alive',true)->orderby('apellidos')->get();

        return view('administracion.empleados.index')->with('empleados',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposDocumento = TipoDocumento::where('alive',true)->pluck('tipoDocumento','id');
        $cargos = Cargo::where('alive',true)->pluck('cargo', 'id');
        $centrosTrabajo = CentroTrabajo::where('alive',true)->pluck('centroTrabajo', 'id');
        $epss = EPS::where('alive',True)->pluck('eps','id');
        $arls = ARL::where('alive',True)->pluck('arl','id');
        $fondosPensiones = FondosPensiones::where('alive',True)->pluck('fondosPensiones','id');
        $fondosCesantias = FondosCesantias::where('alive',True)->pluck('fondosCesantias','id');

        return view('administracion.empleados.create')
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento)
            ->with('epss',$epss)
            ->with('arls',$arls)
            ->with('fondosPensiones',$fondosPensiones)
            ->with('fondosCesantias',$fondosCesantias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado();

        $empleado->tipoDocumento_id = $request->tipo_documento;
        $empleado->identificacion = $request->identificacion;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->genero = $request->genero;
        $empleado->grupoSanguineo = $request->grupoSanguineo;
        $empleado->fechaNacimiento = $request->fechaNacimiento;
        $empleado->ciudadNacimiento = $request->ciudadNacimiento;
        $empleado->departamentoNacimiento = $request->departamentoNacimiento;
        $empleado->paisNacimiento = $request->paisNacimiento;
        $empleado->estadoCivil = $request->estadoCivil;
        $empleado->numeroHijos = $request->numeroHijos;
        $empleado->ciudadDireccion = $request->ciudadDireccion;
        $empleado->departamentoDireccion = $request->departamentoDireccion;
        $empleado->paisDireccion = $request->paisDireccion;
        $empleado->direccion = $request->direccion;
        $empleado->emailPersonal = $request->emailPersonal;
        $empleado->telefonoFijo = $request->telefonoFijo;
        $empleado->telefonoCelular = $request->telefonoCelular;
        $empleado->fechaIngreso = $request->fechaIngreso;
        $empleado->emailCorporativo = $request->emailCorporativo;
        $empleado->cargo_id = $request->cargo;
        $empleado->eps = $request->eps;
        $empleado->arl = $request->arl;
        $empleado->fondoPensiones = $request->fondoPensiones;
        $empleado->fondoCesantias = $request->fondoCesantias;
        $empleado->centro_trabajo_id = $request->centroTrabajo;
        $empleado->estado = $request->estado;
        $empleado->fechaRetiro = $request->fechaRetiro;
        $empleado->save();

        flash('Emplead@ <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('empleados.show',$empleado->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        $tiposDocumento = TipoDocumento::where('alive',true)->pluck('tipoDocumento','id');
        $cargos = Cargo::where('alive',true)->pluck('cargo', 'id');
        $centrosTrabajo = CentroTrabajo::where('alive',true)->pluck('centroTrabajo', 'id');
        $epss = EPS::where('alive',True)->pluck('eps','id');
        $arls = ARL::where('alive',True)->pluck('arl','id');
        $fondosPensiones = FondosPensiones::where('alive',True)->pluck('fondosPensiones','id');
        $fondosCesantias = FondosCesantias::where('alive',True)->pluck('fondosCesantias','id');
        $tiposContrato = TipoContrato::where('alive',true)->pluck('tipoContrato','id');
        $contratos = Contrato::where('empleado_id','=',$id)->where('alive',true)->get();    
        $nivelesFormacion = NivelEstudio::where('alive',true)->pluck('nivelEstudio','id');
        $areasformacion = AreaEstudio::where('alive',true)->pluck('areaEstudio','id'); 
        $formaciones = Formacion::where('empleado_id','=',$id)->where('alive',true)->get(); 
        $examenes = Examen::where('empleado_id','=',$id)->where('alive',true)->get();   
        $tiposAusentismo = TipoVacaciones::where('alive',true)->pluck('tipoVacaciones','id');
        $ausentismos = Vacacion::where('empleado_id','=',$id)->where('alive',true)->get();
        $tipoSST = TipoSST::where('alive',true)->pluck('tipoSST','id');
        $causasSSt_principales = causaSSt::where('alive',true)
            ->where('principal',true)
            ->pluck('causa','id');
        $causasSSt_complementarias = causaSSt::where('alive',true)
            ->where('principal',false)
            ->pluck('causa','id');
        $SSTs = SST::where('empleado_id','=',$id)->where('alive',true)->get();
        $adjuntos = Adjunto::where('empleado_id','=',$id)->where('alive',true)->get();

        return view('administracion.empleados.show')
            ->with('empleado',$empleado)
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento)
            ->with('epss',$epss)
            ->with('arls',$arls)
            ->with('fondosPensiones',$fondosPensiones)
            ->with('fondosCesantias',$fondosCesantias)
            ->with('tiposContrato',$tiposContrato)
            ->with('contratos',$contratos)
            ->with('nivelesFormacion',$nivelesFormacion)
            ->with('areasformacion',$areasformacion)
            ->with('formaciones',$formaciones)
            ->with('examenes',$examenes)
            ->with('tiposAusentismo',$tiposAusentismo)
            ->with('ausentismos',$ausentismos)
            ->with('tipoSST',$tipoSST)
            ->with('causasSSt_principales',$causasSSt_principales)
            ->with('causasSSt_complementarias',$causasSSt_complementarias)
            ->with('SSTs',$SSTs)
            ->with('adjuntos',$adjuntos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $tiposDocumento = TipoDocumento::where('alive',true)->pluck('tipoDocumento','id');
        $cargos = Cargo::where('alive',true)->pluck('cargo', 'id');
        $centrosTrabajo = CentroTrabajo::where('alive',true)->pluck('centroTrabajo', 'id');
        $epss = EPS::where('alive',True)->pluck('eps','id');
        $arls = ARL::where('alive',True)->pluck('arl','id');
        $fondosPensiones = FondosPensiones::where('alive',True)->pluck('fondosPensiones','id');
        $fondosCesantias = FondosCesantias::where('alive',True)->pluck('fondosCesantias','id');

        return view('administracion.empleados.edit')
            ->with('empleado',$empleado)
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento)
            ->with('epss',$epss)
            ->with('arls',$arls)
            ->with('fondosPensiones',$fondosPensiones)
            ->with('fondosCesantias',$fondosCesantias);
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
        $empleado = Empleado::find($id);

        $empleado->tipoDocumento_id = $request->tipo_documento;
        $empleado->identificacion = $request->identificacion;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->genero = $request->genero;
        $empleado->grupoSanguineo = $request->grupoSanguineo;
        $empleado->fechaNacimiento = $request->fechaNacimiento;
        $empleado->ciudadNacimiento = $request->ciudadNacimiento;
        $empleado->departamentoNacimiento = $request->departamentoNacimiento;
        $empleado->paisNacimiento = $request->paisNacimiento;
        $empleado->estadoCivil = $request->estadoCivil;
        $empleado->numeroHijos = $request->numeroHijos;
        $empleado->ciudadDireccion = $request->ciudadDireccion;
        $empleado->departamentoDireccion = $request->departamentoDireccion;
        $empleado->paisDireccion = $request->paisDireccion;
        $empleado->direccion = $request->direccion;
        $empleado->emailPersonal = $request->emailPersonal;
        $empleado->telefonoFijo = $request->telefonoFijo;
        $empleado->telefonoCelular = $request->telefonoCelular;
        $empleado->fechaIngreso = $request->fechaIngreso;
        $empleado->emailCorporativo = $request->emailCorporativo;
        $empleado->cargo_id = $request->cargo;
        $empleado->eps = $request->eps;
        $empleado->arl = $request->arl;
        $empleado->fondoPensiones = $request->fondoPensiones;
        $empleado->fondoCesantias = $request->fondoCesantias;
        $empleado->centro_trabajo_id = $request->centroTrabajo;
        $empleado->estado = $request->estado;
        $empleado->fechaRetiro = $request->fechaRetiro;
        $empleado->save();

        flash('Emplead@ <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se editó exitosamente', 'warning')->important();
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        
        $empleado->alive = false;
        $empleado->save();

        flash('Emplead@ <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('empleados.index');
    }

    public function cargarRiesgo(Request $request)
    {
        if($request->ajax()){    

            $riesgo = DB::table('centrosTrabajo')
                ->join('nivelRiesgos', 'centrosTrabajo.nivelRiesgo_id', '=', 'nivelRiesgos.id')
                ->where('centrosTrabajo.id','=',$request->centroTrabajo)
                ->select('centrosTrabajo.centroTrabajo', 'nivelRiesgos.riesgo', 'nivelRiesgos.valor')
                ->get();

            return response($riesgo);
        }
    }
}
