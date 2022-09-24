<?php
namespace App\accion;

use App\Models\Alumno;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class BuscarAlumnoAction
{
    protected $model;

    public function __construct(Alumno $model)
    {
        $this->model = $model;
    }

    public function execute($id)
    {
        return $this->model::activo()
        ->where('id', '=', $id)
        ->first();
    }
}

?>