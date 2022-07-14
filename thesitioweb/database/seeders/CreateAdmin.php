<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->primerNombre = 'Admin';        
        $user->primerApellido = '#1';        
        $user->mail = 'admin@test.com';
        $user->password = '1234';
        $user->role = 'admin';
        $user->estado;

        $user->save();
    }
}
