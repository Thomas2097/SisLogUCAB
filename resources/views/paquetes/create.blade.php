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
                <h1>Paquetes</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/paquetes/create" style="background-color: green;">Crear</a></li>
                    <li><a href="/paquetes">Consultar</a></li>
                    <!--<li><a href="/usuarios/update">Modificar</a></li>
                    <li><a href="/usuarios/delete">Eliminar</a></li>-->
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Registrar un Paquete</h1>
             <!--   <div style="margin-left:16%; margin-top:30px">-->
                    <div id="formulario">
                        <form action="{{ action('PaquetesController@store') }}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>Fecha de entrega:</td>
                                    <td>
                                    <input type="date" name="fecha_entrega">          
                                    </td>
                                </tr>
                                <tr>
                                    <td>Peso:</td>
                                    <td>
                                        <input type="text" name="peso" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alto:</td>
                                    <td>
                                        <input type="text" name="alto" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ancho:</td>
                                    <td>
                                        <input type="text" name="ancho" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Profundidad:</td>
                                    <td>
                                        <input type="text" name="profundidad" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tipo de producto:</td>
                                    <td>
                                        <select name="fk_tipo_producto">
                                            @foreach ($tipos_productos as $tp)
                                            <option value="{{$tp->codigo}}">{{$tp->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cliente:</td>
                                    <td>
                                        <select name="fk_cliente">
                                            @foreach ($clientes as $cli)
                                            <option value="{{$cli->codigo}}">{{$cli->cedula}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destinatario:</td>
                                    <td>
                                        <select name="fk_destinatario">
                                            @foreach ($destinatarios as $des)
                                            <option value="{{$des->codigo}}">{{$des->cedula}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sucursal de origen:</td>
                                    <td>
                                        <select name="fk_sucursal_origen">
                                            @foreach ($sucursales as $suc)
                                            <option value="{{$suc->codigo}}">{{$suc->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sucursal de destino:</td>
                                    <td>
                                        <select name="fk_sucursal_destino">
                                            @foreach ($sucursales as $suc2)
                                            <option value="{{$suc2->codigo}}">{{$suc2->nombre}}</option>
                                            @endforeach
                                        </select>
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