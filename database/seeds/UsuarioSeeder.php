<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'marcos',
            'email' => 'correo@correo.com',
            'email_verified_at' => '2020-11-28 01:52:54',
            'password' => Hash::make('12345678'),
            'rol' => 'admin',
        ]);

        $user = User::create([
            'name' => 'socrates',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678'),
            'rol' => 'user',
        ]);
    }
}
