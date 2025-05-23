<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'id'=>1,
            'username'=>'J.R.R. Tolkien',
            'email'=>'I6VbJ@example.com',
            'password'=>'password', 
        ]);

        Author::create([
            'id'=>2,
            'username'=>'Gabriel García Márquez',
            'email'=>'Oo8h5@example.com',
            'password'=>'passworddos', 
        ]);

        Author::create([
            'id'=>3,
            'username'=>'Ernesto Sabato',
            'email'=>'6kGtM@example.com',
            'password'=>'passwordtres', 
        ]);

        Author::create([
            'id'=>4,
            'username'=>'Julio Cortázar',
            'email'=>'julio@hotmail.com',
            'password'=>'passwordcuatro', 
        ]);
    }
}
