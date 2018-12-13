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
                <h1>Sucursales</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/sucursales/create">Crear</a></li>
                    <li><a href="/sucursales" >Consultar</a></li>
                    <li><a href="/sucursales/update"style="background-color: green;">Modificar</a></li>
                    <li><a href="/sucursales/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Editar la Sucursal: {{ $sucursal->codigo }}</h1>
             <!--   <div style="margin-left:16%; margin-top:30px">-->
                    <div id="formulario">
                        <form action="/sucursales/update/{{$sucursal->codigo}}" method="post">
                            {{ csrf_field() }}
                            <table>
                                <tr>
                                    <td>Nombre:</td>
                                    <td>
                                        <input type="text" name="nombre" value="{{ $sucursal->nombre }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacidad (metros cuadrados):</td>
                                    <td>
                                        <input type="text" name="capacidad_m2" value="{{ $sucursal->capacidad_m2 }}"/>
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
                                    <td>Correo:</td>
                                    <td>
                                        <input type="text" name="correo" value="{{ $sucursal->correo }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Capacidad de los Almacenes:</td>
                                    <td>
                                        <input type="text" name="capacidad_alm" value="{{ $sucursal->capacidad_alm }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tamaño del Depósito:</td>
                                    <td>
                                        <input type="text" name="tam_deposito" value="{{ $sucursal->tam_deposito }}"/>
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