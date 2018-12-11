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
                <li> Sucursales</li>
                <li> Empleados </li>
                <li> Modulo Y</li>
                <li> Modulo x </li>
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
                <h1>Clientes</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/clientes/create">Crear</a></li>
                    <li><a href="/clientes" >Consultar</a></li>
                    <li><a href="/clientes/update"style="background-color: green;">Modificar</a></li>
                    <li><a href="/clientes/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Editar al cliente: {{ $cliente->codigo }}</h1>
             <!--   <div style="margin-left:16%; margin-top:30px">-->
                    <div id="formulario">
                        <form action="/clientes/update/{{$cliente->codigo}}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>Cédula:</td>
                                    <td>
                                        <input type="text" name="cedula" value="{{ $cliente->cedula }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nombre:</td>
                                    <td>
                                        <input type="text" name="nombre" value="{{ $cliente->nombre }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Apellido:</td>
                                    <td>
                                        <input type="text" name="apellido" value="{{ $cliente->apellido }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Fecha de Nacimiento:</td>
                                    <td>
                                        <input type="date" name="fecha_nac" value="{{ $cliente->fecha_nac}}">
                                    </td>
                                </tr>
                                <tr>
                                <!--   <td>Sexo:</td>
                                    <td>
                                        <input type="radio" name="opSexo" value="m">Masculino
                                        <input type="radio" name="opSexo" value="f">Femenino
                                    </td>
                                </tr>   -->
                                <tr>
                                    <td>Dirección:</td>
                                    <td>
                                        <select name="fk_lugar" value="{{ $cliente->fk_lugar}}">
                                            <option value="1">Parroquia1</option>
                                        </select>
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
                                    <td>Empresa:</td>
                                    <td>
                                        <input type="text" name="empresa" value="{{ $cliente->empresa }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>L-Vip:</td>
                                    <td>
                                        <input type="radio" name="lvip" value="si">Sí
                                        <input type="radio" name="lvip" value="no">No
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