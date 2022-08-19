<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'nombre',
        'telefono',
        'ciudad',
        'dir_1',
        'dir_2',
        'email',
        'ct_alterno',
        'rtn',
        'identidad',
        'observaciones',
        'products'
    ];

    protected $casts = [
        'products' => 'array'
    ];
}
