<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsAlergensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products_alergens')->insert([
            'products_id' => '1',
            'alergens_id' => '1'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '1',
            'alergens_id' => '2'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '1',
            'alergens_id' => '3'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '1',
            'alergens_id' => '4'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '2',
            'alergens_id' => '1'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '2',
            'alergens_id' => '3'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '2',
            'alergens_id' => '4'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '3',
            'alergens_id' => '2'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '3',
            'alergens_id' => '4'
        ]);
        DB::table('products_alergens')->insert([
            'products_id' => '4',
            'alergens_id' => '3'
        ]);
    }
}
