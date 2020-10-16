<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagepath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'HerryGanteng',
            'description' => 'heri kamu kok gantengsi',
            'price' => '$9',
        ]);
        $product->save();
        $product = new \App\Product([
            'imagepath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'HerryGanteng',
            'description' => '',
            'price' => '$9',
        ]);
        $product->save();
        $product = new \App\Product([
            'imagepath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'HerryGanteng',
            'description' => '',
            'price' => '$9',
        ]);
        $product->save();
        
    }
}
