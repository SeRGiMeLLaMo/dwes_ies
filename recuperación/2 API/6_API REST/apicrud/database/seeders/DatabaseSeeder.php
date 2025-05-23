<?php

namespace Database\Seeders;


use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Ranking; // Importar el modelo Ranking

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
            BookSeeder::class,
            AuthorSeeder::class,
            RankingSeeder::class,
        ]);
    }
}
