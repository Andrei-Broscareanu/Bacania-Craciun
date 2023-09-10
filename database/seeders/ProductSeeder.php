<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Pepene Rosu',
            'slug' => 'pepene_rosu',
            'description' => 'Descrierea acestui pepene rosu',
            'price' => 4.99,
        ]);


        DB::table('products')->insert([
            'name' => 'Castraveti',
            'slug' => 'slug',
            'description' => 'Descrierea acestor castraveti',
            'price' => 6.77,
        ]);
    }
}
