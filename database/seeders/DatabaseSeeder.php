<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator', 
            'cpf' => '12345678999', 
            'email' => 'adm.marcasite@gmail.com', 
            'password' => Hash::make('123456'),
            'role_id' => 1,
        ]);
    }
  
}
