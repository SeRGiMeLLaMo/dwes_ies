<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {/*
        Product::create([
            'name'=> 'Example',
            'short_description' => 'Lorem Ipsum',
            'description' => 'Lorem ipsum dolor set aimet',
            'price'=> 42
        ]);

        Product::create([
            'name'=> 'Example 2',
            'short_description' => 'Lorem Ipsum',
            'description' => 'Lorem ipsum dolor set aimet',
            'price'=> 25
        ]);

        Product::create([
            'name'=> 'Example 3',
            'short_description' => 'Lorem Ipsum',
            'description' => 'Lorem ipsum dolor set aimet',
            'price'=> 60
        ]);*/

 
        Product::factory()->count(150)->create();//Indicamos que queremos crear un producto a través del factory
   
    }
}
