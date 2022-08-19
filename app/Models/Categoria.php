<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
    ];

    public function productos(){

        return $this->HasMany(Producto::class, 'id');

    }

    public function subcategoria(){

        return $this->HasMany(SubCategoria::class, 'idsubcategoria');

    }


}
