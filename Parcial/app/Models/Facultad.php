<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;

    protected $table = 'facultad';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function scopeActivo($query)
    {
        return $query->where('estado', '=', self::ESTADO_ACTIVO);
    }
}
