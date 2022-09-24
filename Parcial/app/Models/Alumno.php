<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    use HasFactory;
    use SoftDeletes;

    const ESTADO_ELIMINADO = 0;
    const ESTADO_ACTIVO = 1;

    protected $table = 'alumno';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idRol',
        'idFacultad',
        'carne',
        'nombre',
        'apellido',
        'dpi',
        'nit',
        'email',
        'telefono',
        'estado'
    ];

    public function rol()
    {
        return $this->hasOne('App\Models\Rol', 'id', 'idRol');
    }

    public function facultad()
    {
        return $this->hasOne('App\Models\Facultad', 'id', 'idFacultad');
    }

    public function scopeActivo($query)
    {
        return $query->where('estado', '=', self::ESTADO_ACTIVO);
    }

}
