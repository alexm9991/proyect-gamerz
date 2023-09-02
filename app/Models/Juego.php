<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    use HasFactory;
    protected $table = 'juegos';
    protected $primarykey = 'id';
    protected $fillable = ['nombre_juego', 'precio', 'imagen_juego', 'id_categoria', 'id_plataforma'];
    protected $guarded = [];
    public $timestamps = false;
}
