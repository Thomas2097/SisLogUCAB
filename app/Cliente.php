<?php

namespace SisLogUCAB;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table='cliente';
    protected $primaryKey='codigo';
    public $timestamps=false;

}