<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use File;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Department::truncate();
        $json = File::get("database/data/departamentos.json");
        $departamentos = json_decode($json,true);
        foreach($departamentos as $departamento){
            Department::create($departamento);
        }
    }
}
