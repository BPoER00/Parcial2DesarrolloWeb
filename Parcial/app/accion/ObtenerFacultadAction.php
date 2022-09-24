<?php
namespace App\accion;

use App\Models\Facultad;
use App\Models\Rol;

class ObtenerFacultadAction
{
    protected $model;

    public function __construct(Facultad $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        return $this->model::query()->paginate(15);
    }
}

?>