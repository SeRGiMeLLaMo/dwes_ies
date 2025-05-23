<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ranking; // Importar el modelo Ranking

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Calificaciones para los libros
        Ranking::create([
            'book_id' => 1,
            'rating' => 5,
        ]);

        Ranking::create([
            'book_id' => 2,
            'rating' => 4,
        ]);

        Ranking::create([
            'book_id' => 3,
            'rating' => 5,
        ]);

        Ranking::create([
            'book_id' => 4,
            'rating' => 2,
        ]);

        Ranking::create([
            'book_id' => 5,
            'rating' => 4,
        ]);

        Ranking::create([
            'book_id' => 6,
            'rating' => 2,
        ]);
    }
}
