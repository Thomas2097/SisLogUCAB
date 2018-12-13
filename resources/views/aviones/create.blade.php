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
                <h1>Aviones</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/aviones/create" style="background-color: green;">Crear</a></li>
                    <li><a href="/aviones">Consultar</a></li>
                    <li><a href="/aviones/update">Modificar</a></li>
                    <li><a href="/aviones/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Registrar un Avión</h1>
             <!--   <div style="margin-left:16%; margin-top:30px">-->
                    <div id="formulario">
                        <form action="{{ action('AvionesController@store') }}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>Peso:</td>
                                    <td>
                                        <input type="text" name="peso" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacidad de carga (kg):</td>
                                    <td>
                                        <input type="text" name="capacidad_carga" />
                                    </td>
                                </tr>
                                <td>Descripcion:</td>
                                    <td>
                                        <input type="text" name="descripcion" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Clasificación:</td>
                                    <td>
                                        <input type="text" name="clasificacion" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Longitud</td>
                                    <td>
                                        <input type="text" name="longitud" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Envergadura</td>
                                    <td>
                                        <input type="text" name="envergadura" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Modelo:</td>
                                    <td>
                                        <select name="fk_modelo">
                                            @foreach ($modelos as $mod)
                                            <option value="{{$mod->codigo}}">{{$mod->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sucursal:</td>
                                    <td>
                                        <select name="fk_sucursal">
                                            @foreach ($sucursales as $suc)
                                            <option value="{{$suc->codigo}}">{{$suc->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Area</td>
                                    <td>
                                        <input type="text" name="area" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Altura</td>
                                    <td>
                                        <input type="text" name="altura" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacidad de combustible</td>
                                    <td>
                                        <input type="text" name="cap_combustible" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Diametro de fuselaje</td>
                                    <td>
                                        <input type="text" name="diam_fuselaje" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ancho de la cabina</td>
                                    <td>
                                        <input type="text" name="ancho_cabina" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Velocidad máxima</td>
                                    <td>
                                        <input type="text" name="velocidad_max" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Peso máximo</td>
                                    <td>
                                        <input type="text" name="peso_max" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Número de motores</td>
                                    <td>
                                        <input type="text" name="num_motores" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Carrera de despegue</td>
                                    <td>
                                        <input type="text" name="car_despegue" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center">
                                        <input type="submit" name="enviar" value="Enviar" style="padding-left:20px; padding-right: 20px">
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