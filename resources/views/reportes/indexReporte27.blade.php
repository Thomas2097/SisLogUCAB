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
                <h1>Empleados</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/empleados/create">Crear</a></li>
                    <li><a href="/empleados" style="background-color: green;">Consultar</a></li>
                    <li><a href="/empleados/update">Modificar</a></li>
                    <li><a href="/empleados/delete">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Listado de empleados</h1>
 <!--               <div style="margin-left:16%; margin-top:30px">-->
                    <div>
                        <table id="automoviles" width="80%" cellspacing="0">
                            <thead>
                                <th>Cédula</th>
                                <th>Nombre completo</th>
                                <th>Estado civil</th> 
                                <th>Cargo</th>   
                                <th>Fecha de ingreso</th>
                                <th>Fecha de egreso</th>
                                <th>¿Activo?</th>
                            </thead>
                            <tbody>
                                @foreach ($emp as $e)
                                <tr>
                                    <td>{{$e->cedula}}</td>
                                    <td>{{$e->nombre_completo}}</td>
                                  	<td>{{$e->edo_civil}}</td>
                                  	<td>{{$e->cargo}}</td>
                                  	<td>{{$e->fecha_ingreso}}</td>
                                  	<td>{{$e->fecha_egreso}}</td>
                                  	<td>{{$e->activo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table width="80%" cellspacing="0">
                        	<thead>
                        		<th>Total de activos</th>
                        		<th>Total de egresados</th>
                        	</thead>
                        	<tbody>
                        		@foreach ($num as $n)
                        		<tr>
                        			<td>{{$n->activos}}</td>
                        			<td>{{$n->egresados}}</td>
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
            $('#automoviles').DataTable();
        } );
    </script>
</body>

</html>