<?php
namespace App\accion;

use App\Models\Alumno;
use Exception;
use Illuminate\Support\Facades\DB;
use Throwable;

class EliminarAlumnoAction
{
    protected $model;
    protected $action;

    public function __construct(Alumno $model, BuscarAlumnoAction $action)
    {
        $this->model = $model;
        $this->action = $action;
    }

    public function execute($id)
    {
        try
        {
            $alumno = $this->action->execute($id);
            if(!$alumno)
            {
                throw new Exception('Alumno No Existe');
            }
            
            DB::beginTransaction();            
            $alumno->estado = Alumno::ESTADO_ELIMINADO;
            $alumno->deleted_at = now();
            $alumno->update();
            DB::commit();

            return true;
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return false;
    }
}

?>