<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::create(['name' => 'Rosii']);
        $product2 = Product::create(['name' => 'Castraveti']);

        $category1 = Category::create(['name' => 'Rosie']);
        $category2 = Category::create(['name' => 'Castraveti']);

        $category1->products()->attach([$product1->id, $product2->id]);
        $category2->products()->attach([$product2->id]);
    }
}
