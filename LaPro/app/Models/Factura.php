<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Factura extends Model
{
    //
    protected $fillable = [
        "numeroFactura",

    ];

    public static function getAllFacturas(){
        return DB::table('facturas')->get();
    }
}
