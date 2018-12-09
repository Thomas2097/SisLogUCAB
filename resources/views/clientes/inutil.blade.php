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
                <li><a href="CreateCliente.html"> Clientes </a></li>
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

                    <li><a href="Cuenta.html">Cuenta</a></li>
                    <li><a href="Nosotros.html">Sobre nosotros</a></li>
                    <li><a href="SisLogUCAB.html">Inicio</a></li>


                </ul>

            </div>

        </div>
        <div id="espaciolateral">
            <div id="lateral">
                <h1>Clientes</h1>
                <ul><!--Aquí coloquen los links hacia las otras vistas de sus entidades-->
                    <li><a href="/crearCliente">Crear</a></li>
                    <li><a href="ConsultarCliente.html" style="background-color: green;">Consultar</a></li>
                    <li><a href="ModificarCliente.html">Modificar</a></li>
                    <li><a href="DeleteCliente.html">Eliminar</a></li>
                </ul>
            </div>

        </div>
        <div id="centro">
            <div id="principal">
                <h1>Consultar clientes</h1>
                <div style="margin-left:16%; margin-top:30px">
                    <div>
                        <table id="clientes" width="80%" cellspacing="0">
                            <thead>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cédula</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Estado Civil</th>
                                <th>Empresa</th>
                                <th>¿L-Vip?</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Juan</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                                <tr>
                                    <td>Jose</td>
                                    <td>Gomes</td>
                                    <td>26562744</td>
                                    <td>09/11/1995</td>
                                    <td>Soltero</td>
                                    <td>Candy UCAB</td>
                                    <td>no</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

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
            $('#clientes').DataTable();
        } );
    </script>
</body>

</html>