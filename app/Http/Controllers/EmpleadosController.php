<?php

namespace SisLogUCAB\Http\Controllers;

use Illuminate\Http\Request;

use SisLogUCAB\Empleado;

use SisLogUCAB\Usuario;

use DB;

class EmpleadosController extends Controller
{

    public function index()
    {
        
        $empleados=Empleado::all();

        return view("empleados.index", compact("empleados"));

    }

    public function indexDelete()
    {

        $empleados=Empleado::all();

        return view("Empleados.delete", compact("empleados"));

    }

    public function indexUpdate()
    {

        $empleados=Empleado::all();

        return view("empleados.edit", compact("empleados"));

    }

    public function create()
    {

        $lugares=DB::table('lugar')->where('tipo','=','parroquia')->get();
        $cargos=DB::table('cargo')->get();

        return view("empleados.create", ["lugares"=>$lugares], ["cargos"=>$cargos]);

    }

    public function store(Request $request)
    {
        $empleado=new Empleado;

        $empleado->cedula=$request->cedula;
        $empleado->nombre=$request->nombre;
        $empleado->apellido=$request->apellido;
        $empleado->correo_pers=$request->correo_pers;
        $empleado->correo_emp=$request->correo_emp;
        $empleado->fecha_nac=$request->fecha_nac;
        $empleado->niv_acad=$request->niv_acad;
        $empleado->profesion=$request->profesion;
        $empleado->edo_civil=$request->edo_civil;
        $empleado->num_hijos=$request->num_hijos;
        $empleado->fecha_ingr=$request->fecha_ingr;
        $empleado->activo='si';
        $empleado->fk_lugar=$request->fk_lugar;
        $empleado->fk_cargo=$request->fk_cargo;

  
        //$empleado->fk_usuario=$request->fk_usuario;
        $usuario= Usuario::Where('nombre',$request->cedula)->first();
        $empleado->fk_usuario=$usuario->codigo;
        $empleado->save();
        return redirect('empleados/create');

    }

    public function show($id)
    {
        //
    }

    public function edit($codigo)
    {

        $empleado = Empleado::where('codigo',$codigo)->first();
        $lugares = DB::table('lugar')->where('tipo', '=', 'parroquia')->get();
        $cargos = DB::table('cargo')->get();
        return view('empleados.update',["empleado"=>$empleado, "lugares"=>$lugares, "cargos"=>$cargos]);

    }


    public function update(Request $request, $codigo)
    {
        $nuevoCedula= $request->input('cedula');
        $nuevoNombre = $request->input('nombre');
        $nuevoApellido = $request->input('apellido');
        $nuevoCorreo_pers = $request->input('correo_pers');
        $nuevoCorreo_emp = $request->input('correo_emp');
        $nuevoFecha_nac = $request->input('fecha_nac');
        $nuevoNiv_acad = $request->input('niv_acad');
        $nuevoProfesion= $request->input('profesion');
        $nuevoEdo_civil = $request->input('edo_civil');
        $nuevoNum_hijos = $request->input('num_hijos');
        $nuevoFecha_ingr = $request->input('fecha_ingr');
        $nuevoActivo = $request->input('activo');
        $nuevoFk_lugar = $request->input('fk_lugar');
        $nuevoFk_cargo = $request->input('fk_cargo');
        //----------------------------------------------
        $empleado = Empleado::find($codigo);
        $empleado->cedula = $nuevoCedula;
        $empleado->nombre = $nuevoNombre;
        $empleado->apellido = $nuevoApellido;
        $empleado->correo_pers = $nuevoCorreo_pers;
        $empleado->correo_emp = $nuevoCorreo_emp;
        $empleado->fecha_nac = $nuevoFecha_nac;
        $empleado->niv_acad = $nuevoNiv_acad;
        $empleado->profesion = $nuevoProfesion;
        $empleado->edo_civil = $nuevoEdo_civil;
        $empleado->num_hijos = $nuevoNum_hijos;
        $empleado->fecha_ingr = $nuevoFecha_ingr;
        $empleado->activo = $nuevoActivo;
        $empleado->fk_lugar = $nuevoFk_lugar;
        $empleado->fk_cargo = $nuevoFk_cargo;

        $empleado->save();

        return redirect('empleados/update');
    }


    public function destroy($codigo)
    {

       Empleado::destroy($codigo);

       return redirect('empleado/delete');

    }
}