<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function user (){
        return $this->belongsTo(User::class);
    }

    //relacion de muchos a muchos de nuestra tabla pivote pedido_productos
    public function productos(){
        return $this->belongsToMany(Producto::class, 'pedido_productos')->withPivot('cantidad');
    }
}
