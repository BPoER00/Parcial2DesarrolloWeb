<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Throwable;

class Facultad extends Seeder
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

            DB::table('facultad')->insert([
                'nombre' => 'Ingenieria En Sistemas',
                'estado' => 1
            ]);

            DB::table('facultad')->insert([
                'nombre' => 'Arquitectura',
                'estado' => 1
            ]);

            DB::table('facultad')->insert([
                'nombre' => 'Psicologia',
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
