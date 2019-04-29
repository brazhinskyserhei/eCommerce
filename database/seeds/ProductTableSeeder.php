<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Product::truncate();
        Product::unguard();
        factory(Product::class, 10)->create();
        Product::reguard();

        $products = Product::all();

        Category::all()->each(function ($category) use ($products) {
            $category->products()->attach(
                $products->random(rand(1, 4))->pluck('id')->toArray()
            );
        });


    }
}
