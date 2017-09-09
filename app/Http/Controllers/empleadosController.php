<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\TipoDocumento;
use App\Cargo;
use App\CentroTrabajo;

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

        return view('administracion.empleados.create')
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento);
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

        flash('Empleado <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se creó exitosamente', 'success')->important();
        return redirect()->route('empleados.edit',$empleado->id);

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

        return view('administracion.empleados.show')
            ->with('empleado',$empleado)
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento);
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

        return view('administracion.empleados.edit')
            ->with('empleado',$empleado)
            ->with('centrosTrabajo',$centrosTrabajo)
            ->with('cargos',$cargos)
            ->with('tiposDocumento',$tiposDocumento);
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

        flash('Empleado <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se editó exitosamente', 'warning')->important();
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

        flash('Empleado <b>'.$empleado->nombres.' '.$empleado->apellidos.'</b> se eliminó exitosamente', 'danger')->important();
        return redirect()->route('empleados.index');
    }
}
