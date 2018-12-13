<?php

namespace SisLogUCAB;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table='usuario';
    protected $primaryKey='codigo';
    public $timestamps=false;

}