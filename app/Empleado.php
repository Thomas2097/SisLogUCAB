<?php

namespace SisLogUCAB;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //
    protected $table='empleado';
    protected $primaryKey='codigo';
    public $timestamps=false;

}