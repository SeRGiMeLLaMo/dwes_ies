<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            User::create([
                'id' => 1,
                'name' => 'Pepito',
                'email' => 'pepito@example.com',
                'password' => Hash::make('122345678')
            ]);

            User::create([
                'id' => 2,
                'name' => 'example2',
                'email' => 'example2@example.com',
                'password' => Hash::make('122345678')
            ]);
    
            User::create([
                'id' => 3,
                'name' => 'example3',
                'email' => 'example3@example.com',
                'password' => Hash::make('122345678')
            ]);
    
    }
}
