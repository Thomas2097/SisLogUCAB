<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SisLogUCAB</title>
    <style type="text/css">
    </style>
    <link href="{{ asset('css/carnet.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


</head>
<body>
 @foreach ($vip as $v)
  <div class="card back">

  <div class="yellow"><h2>SISLOG UCAB/L-VIP</h2></div>

  <div class="top dots"></div>

  <div class="personal-info">
    <p>{{$v->nombre}}</p>
    <p>CI:{{$v->cedula}}</p>
    <p>ID Carnet:{{$v->codigo_carnet}}</p>
    <p></p>
    <p>Codigo Personal:{{$v->codigo}}</p>
  </div>
  <div class="bottom dots"></div>
  <div class="pink"></div>
</div>
  @endforeach
  





</body>

</html>