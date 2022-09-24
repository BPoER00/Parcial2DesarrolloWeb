<?php
namespace App\accion;

use App\Models\Alumno;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class NuevoAlumnoAction
{
    protected $model;

    public function __construct(Alumno $model)
    {
        $this->model = $model;
    }

    public function execute($modelo)
    {
        DB::beginTransaction();
        try
        {
            $modelo['estado'] = $this->model::ESTADO_ACTIVO;
            $alumno = $this->model::create($modelo);

            DB::commit();
            return $alumno;
        }catch(Exception|Throwable $e)
        {
            DB::commit();
            throw new Exception($e->getMessage());
        }
    }
}

?>