<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table = 'recurso';
    protected $primaryKey = 'id_recurso';
    public $timestamp = 'false';

    protected $fillable = ['id_ambiente', 'descripcion', 'estado'];
}
