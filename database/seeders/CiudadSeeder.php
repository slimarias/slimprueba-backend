<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use File;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        City::truncate();
        $json = File::get("database/data/ciudades.json");
        $ciudades = json_decode($json,true);
        foreach($ciudades as $ciudad){
            City::create($ciudad);
        }
    }
}
