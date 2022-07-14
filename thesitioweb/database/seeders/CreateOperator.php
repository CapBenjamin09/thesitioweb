<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateOperator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->primerNombre = 'Operator';
        $user->primerApellido = '#1';        
        $user->mail = 'operator@test.com';
        $user->password = '1234';
        $user->role = 'operator';
        $user->estado;

        $user->save();
    }
}
