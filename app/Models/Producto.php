<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion',
        'stock',
        'category_id', // <-- DEBE ESTAR AQUÍ
        'user_id',
        'imagen', // <-- Y TAMBIÉN LA IMAGEN
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
