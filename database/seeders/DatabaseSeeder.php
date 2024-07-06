<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {        

        //*DB::table('docente')->insert([
           // 'nombre' => 'admin',
            //'apellido' => 'admin',
           // 'email' => 'admin@admin.com',
            //'password' => Hash::make('admin'),
        //]);

        //DB::table('estudiante')->insert([
           // 'nombre' => 'alumno',
            //'apellido' => 'usuario',
            //'email' => 'user@user.com',
           // 'pin' => Hash::make('123'),
      //  ]);

        DB::table('docente')->insert([
            'nombre' => 'Carlos',
            'apellido' => 'Monchez',
            'email' => 'clmc@admin.com',
            'password' => Hash::make('Propil08Mc$'),
         ]);

        
    }
}
