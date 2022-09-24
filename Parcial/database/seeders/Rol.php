<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Exception;
use Throwable;

class Rol extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try{

            DB::table('rol')->insert([
                'nombre' => 'Alumno',
                'estado' => 1
            ]);

            DB::table('rol')->insert([
                'nombre' => 'Catedratico',
                'estado' => 1
            ]);

            DB::table('rol')->insert([
                'nombre' => 'Servicio',
                'estado' => 1
            ]);

            DB::commit();
        }catch(Exception|Throwable $e)
        {
            DB::rollBack();
            $this->command->warn($e->getMessage());
        }
    }
}
