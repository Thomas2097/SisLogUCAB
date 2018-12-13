<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SisLogUCAB</title>
    <style type="text/css">
    </style>
    <link href="{{ asset('css/stylex.css') }}"; rel="stylesheet" type="text/css"/>
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

                    <li><a href="#cuenta">Cuenta</a></li>
                    <li><a href="#nosotros">Sobre nosotros</a></li>
                    <li><a href="SisLogUCAB.html">Inicio</a></li>


                </ul>

            </div>

        </div>
        <div id="espaciolateral">
            <div id="lateral">
                <h1>Usuarios</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/usuarios/create"">Crear</a></li>
                    <li><a href="/usuarios">Consultar</a></li>
                    <li><a href="/usuarios/update"style="background-color: green;">Modificar</a></li>
                    <li><a href="/usuarios/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Editar un usuario</h1>
                
                <div>
                <table id="usuarios" width="80%" cellspacing="0">
                    <thead>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                        <th>Opcion</th>
                    </thead>

                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->codigo }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->contraseña }}</td>
                        <td>{{ $usuario->fk_rol }}</td>
                        <td><a href="/usuarios/edit/{{ $usuario->codigo }}" />Modificar</td>
                    </tr>
                    @endforeach
                </table>
                </div>

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
            $('#usuarios').DataTable();
        } );
    </script>
</body>

</html>