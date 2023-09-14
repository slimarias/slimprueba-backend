<?php

namespace Database\Seeders;

use App\Models\Acomodation;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'email'=>'ejemplo@mail.com',
            'first_name'=>'Usuario',
            'last_name'=>'Ejemplo',
            'password'=>Hash::make('123456'),
        ]);

        /**
         * Tipos de Habitaciones
         */

        RoomType::truncate();

        RoomType::create(['name'=>'Estandar']);
        RoomType::create(['name'=>'Junior']);
        RoomType::create(['name'=>'Suite']);
        
        /**
         * Acomodaciones
         */

        Acomodation::truncate();

        Acomodation::create(['name'=>'Sencilla']);
        Acomodation::create(['name'=>'Doble']);
        Acomodation::create(['name'=>'Triple']);
        Acomodation::create(['name'=>'Cuadruple']);

        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [1, 1]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [1, 2]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [2, 3]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [2, 4]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [3, 1]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [3, 2]);
        DB::insert('insert into room_type_acomodations (room_type_id, acomodation_id) values (?, ?)', [3, 3]);

    }
}
