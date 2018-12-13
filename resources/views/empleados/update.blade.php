<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SisLogUCAB</title>
    <style type="text/css">
    </style>
    <!--<link href="css/stylex.css" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('css/stylex.css') }}"; rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
</head>

<body>
    <header>
        <nav>
            <ul> <!--Aquí añadan su módulo, junto con el link, siempre coloquen el CreateEntidad.html como link principal-->
                <li><a href="/clientes"> Clientes </a></li>
                <li><a href="/sucursales"> Sucursales </a></li>
                <li><a href="/empleados"> Empleados </a></li>
                <li><a href="/roles"> Roles </a></li>
                <li><a href="/usuarios"> Usuarios </a></li>
                <li><a href="/automoviles"> Automóviles </a></li>
                <li><a href="/aviones"> Aviones </a></li>
                <li><a href="/barcos"> Barcos </a></li>
                <li><a href="/rutas"> Rutas </a></li>
            </ul>
        </nav>
    </header>
    <div id="wrapper">
        <div id="cabecera">
            <div id="title"></div>
            <div id="top">
                <ul>

                    <li><a href="#cuenta">Cuenta</a></li>
                    <li><a href="#nosotros">Sobre nosotros</a></li>
                    <li><a href="SisLogUCAB.html">Inicio</a></li>


                </ul>

            </div>

        </div>
        <div id="espaciolateral">
            <div id="lateral">
                <h1>Empleados</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/empleados/create">Crear</a></li>
                    <li><a href="/empleados" >Consultar</a></li>
                    <li><a href="/empleados/update"style="background-color: green;">Modificar</a></li>
                    <li><a href="/empleados/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Editar al Empleado: {{ $empleado->codigo }}</h1>
             <!--   <div style="margin-left:16%; margin-top:30px">-->
                    <div id="formulario">
                        <form action="/empleados/update/{{$empleado->codigo}}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>Cédula:</td>
                                    <td>
                                        <input type="text" name="cedula" value="{{ $empleado->cedula }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nombre:</td>
                                    <td>
                                        <input type="text" name="nombre" value="{{ $empleado->nombre }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apellido:</td>
                                    <td>
                                        <input type="text" name="apellido" value="{{ $empleado->apellido }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Correo personal:</td>
                                    <td>
                                        <input type="text" name="correo_pers" value="{{ $empleado->correo_pers }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Correo de la empresa:</td>
                                    <td>
                                        <input type="text" name="correo_emp" value="{{ $empleado->correo_emp }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fecha de Nacimiento:</td>
                                    <td>
                                        <input type="date" name="fecha_nac" value="{{ $empleado->fecha_nac}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nivel académico:</td>
                                    <td>
                                        <input type="text" name="niv_acad" value="{{ $empleado->niv_acad }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profesión:</td>
                                    <td>
                                        <input type="text" name="profesion" value="{{ $empleado->profesion }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Estado Civil:</td>
                                    <td>
                                        <input type="radio" name="edo_civil" value="soltero">Solter@
                                        <input type="radio" name="edo_civil" value="casado">Casad@
                                        <input type="radio" name="edo_civil" value="viudo">Viud@
                                    </td>
                                </tr>
                                <tr>
                                    <td>Número de hijos:</td>
                                    <td>
                                        <input type="text" name="num_hijos" value="{{ $empleado->num_hijos}}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fecha de Ingreso a la compañía:</td>
                                    <td>
                                        <input type="date" name="fecha_ingr" value="{{ $empleado->fecha_ingr}}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>¿El empleado se encuentra activo?</td>
                                    <td>
                                        <input type="radio" name="activo" value="no">No
                                        <input type="radio" name="activo" value="si">Sí
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cargo:</td>
                                    <td>
                                        <select name="fk_cargo">
                                            @foreach ($cargos as $car)
                                            <option value="{{$car->codigo}}">{{$car->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dirección:</td>
                                    <td>
                                        <select name="fk_lugar">
                                            @foreach ($lugares as $lug)
                                            <option value="{{$lug->codigo}}">{{$lug->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center">
                                        <input type="submit" name="modificar" value="Modificar" style="padding-left:20px; padding-right: 20px">
                                    </td>
                                </tr>
                            </table>
                        </form>

                    </div>


                <!--</div>-->

            </div>
        </div>
        <div id="pie">
            <p>SisLogUCAB - 2018-2019</p>
        </div>
    </div>
</body>

</html>