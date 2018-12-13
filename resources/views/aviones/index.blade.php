<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SisLogUCAB</title>
    <style type="text/css">
    </style>
    <link href="css/stylex.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />


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

                    <li><a href="Cuenta.html">Cuenta</a></li>
                    <li><a href="Nosotros.html">Sobre nosotros</a></li>
                    <li><a href="SisLogUCAB.html">Inicio</a></li>


                </ul>

            </div>

        </div>
        <div id="espaciolateral">
            <div id="lateral">
                <h1>Aviones</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/aviones/create">Crear</a></li>
                    <li><a href="/aviones" style="background-color: green;">Consultar</a></li>
                    <li><a href="/aviones/update">Modificar</a></li>
                    <li><a href="/aviones/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Consultar aviones</h1>
 <!--               <div style="margin-left:16%; margin-top:30px">-->
                    <div>
                        <table id="aviones" width="80%" cellspacing="0">
                            <thead>
                                <th>Código</th>
                                <th>Peso</th>
                                <th>longitud</th>
                                <th>Capacidad de carga</th>
                                <th>Velocidad máxima</th>
                                <th>Capacidad de Combustible</th>
                                <th>Modelo</th>
                                <th>Sucursal</th>
                            </thead>
                            <tbody>
                                @foreach ($aviones as $avion)
                                <tr>
                                    <td>{{$avion->codigo}}</td>
                                    <td>{{$avion->peso}}</td>
                                    <td>{{$avion->longitud}}</td>
                                    <td>{{$avion->capacidad_carga}}</td>
                                    <td>{{$avion->velocidad_max}}</td>
                                    <td>{{$avion->cap_combustible}}</td>
                                    <td>{{$avion->fk_modelo}}</td>
                                    <td>{{$avion->fk_sucursal}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

 <!--               </div>-->
            </div>
        </div>
        <div id="pie">
            <p>SisLogUCAB - 2018-2019</p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#aviones').DataTable();
        } );
    </script>
</body>

</html>