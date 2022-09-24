<?php
namespace App\accion;

use App\Models\Rol;

class ObtenerRolAction
{
    protected $model;

    public function __construct(Rol $model)
    {
        $this->model = $model;
    }

    public function execute()
    {
        return $this->model::query()->paginate(15);
    }
}

?>