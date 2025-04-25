<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ventana()
    {
        return $this->belongsTo(ventana::class);
    }

    public function kebabs()
    {
        return $this->hasMany(Kebab::class);
    }
}
