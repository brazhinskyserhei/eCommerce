<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Category::truncate();

        //Отключение массового присвоения
        Category::unguard();
        factory(Category::class, 10)->create();

        Category::reguard();
    }
}
