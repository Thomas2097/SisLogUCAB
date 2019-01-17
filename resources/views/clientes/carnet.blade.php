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
                    <div>
                        <table width="25%" cellspacing="0">
                            <tbody>
                                @foreach ($vip as $v)
                                <tr>
                                	<td>Código del carnet:</td>
                                	<td>{{$v->codigo_carnet}}</td>
                                </tr>
                                <tr>
                                	<td>Código del propietario</td>
                                    <td>{{$v->codigo}}</td>
                                </tr>
                                <tr>
                                	<td>Nombre del propietario: </td>
                                	<td>{{$v->nombre}}</td>
                                </tr>
                                <tr>
                                    <td>Cédula del propietario</td>
                                    <td>{{$v->cedula}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

</body>

</html>