<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;

    
    protected $table = 'novedad';

    public $timestamps = false;

    protected $fillable = ['id', 'nombre', 'descripcion', 'estado', 'fecha_solucion'];
}
