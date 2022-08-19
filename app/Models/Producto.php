<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'producto',
        'descripcion',
        'idcategoria',
        'subcategoria',
        'cantidad',
        'costo_dolares',
        'traida_lps',
        'totalCosto_lps',
        'venta',
        'desc5',
        'desc10',
        'desc15',
        'desc20',
    ];

    public function categorias(){

        return $this->belongsTo(Categoria::class, 'idcategoria');

    }
}
