<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'firstName' => 'Rodrigo',
            'lestName' => 'Oliveira',
            'email' => 'contas@rodrigo.com',
            'password' => bcrypt('12345678'),
        ]); 
    }
}
