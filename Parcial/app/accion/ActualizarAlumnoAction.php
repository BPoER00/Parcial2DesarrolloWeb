<?php
namespace App\accion;

use App\Models\Alumno;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class ActualizarAlumnoAction
{
    protected $model;
    protected $action;

    public function __construct(Alumno $model, BuscarAlumnoAction $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    public function execute($modelo, $id)
    {
        $alumno = $this->action->execute($id);
        if(!$alumno)
        {
            throw new Exception('Alumno No Existe');
        }
        DB::beginTransaction();
        try
        {
            $alumno->update($modelo);
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