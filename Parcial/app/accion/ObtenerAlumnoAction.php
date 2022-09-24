<?php
namespace App\accion;

use App\Models\Alumno;

class ObtenerAlumnoAction
{
    protected $model;

    public function __construct(Alumno $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        return $this->model::query()->activo()->paginate(15);
    }
}

?>