<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'id'=>1,
            'title'=>'El Señor de los Anillos',
            'author'=>'J.R.R. Tolkien',
            'genre'=>'Fantasía',
            'pages'=>1216,
            'rating'=>5,
        ]);

        Book::create([
            'id'=>2,
            'title'=>'Cien años de soledad',
            'author'=>'Gabriel García Márquez',
            'genre'=>'Realismo mágico',
            'pages'=>417,
            'rating'=>4,
        ]);

        Book::create([
            'id'=>3,
            'title'=>'El amor en los tiempos del cólera',
            'author'=>'Gabriel García Márquez',
            'genre'=>'Realismo mágico',
            'pages'=>368,
            'rating'=>5,
        ]);
        
        Book::create([
            'id'=>4,
            'title'=>'Crónica de una muerte anunciada',
            'author'=>'Gabriel García Márquez',
            'genre'=>'Realismo mágico',
            'pages'=>120,
            'rating'=>2,
        ]);

        Book::create([
            'id'=>5,
            'title'=>'El túnel',
            'author'=>'Ernesto Sabato',
            'genre'=>'Psicología',
            'pages'=>288,
            'rating'=>4,
        ]);

        Book::create([
            'id'=>6,
            'title'=>'Rayuela',
            'author'=>'Julio Cortázar',
            'genre'=>'Literatura contemporánea',
            'pages'=>560,
            'rating'=>2,
        ]);



        DB::table('author_book')->insert([
            'author_id'=>1,
            'book_id'=>1,
        ]);

        DB::table('author_book')->insert([
            'author_id'=>2,
            'book_id'=>2,
        ]);

        DB::table('author_book')->insert([
            'author_id'=>2,
            'book_id'=>3,
        ]);

        DB::table('author_book')->insert([
            'author_id'=>2,
            'book_id'=>4,
        ]);

        DB::table('author_book')->insert([
            'author_id'=>3,
            'book_id'=>5,
        ]);

        DB::table('author_book')->insert([
            'author_id'=>4,
            'book_id'=>6,
        ]);
    }
}
