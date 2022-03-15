<?php

use App\Departamento;
use App\Periodo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Insertar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamento=Departamento::create([
            'nombrede'=>'LA LIBERTAD'
            ]); 

         $departamento=Departamento::create([
                'nombrede'=>'AMAZONAS'
                ]);
        
        $departamento=Departamento::create([
                    'nombrede'=>'LAMBAYEQUE'
        ]); 

        $periodos=Periodo::create([
                'periodo'=>'Periodo 2022'
         ]); 


    }
}
