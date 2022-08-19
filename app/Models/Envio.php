<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_venta',
        'forma_pago',
        'total',
        'nombre',
        'telefono',
        'ciudad',
        'dir_1',
        'dir_2',
        'email',
        'ct_alterno',
        'observaciones',
        'status',
    ];
}
