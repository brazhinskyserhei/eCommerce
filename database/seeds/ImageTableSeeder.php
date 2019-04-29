<?php

use Illuminate\Database\Seeder;
use App\Models\Image;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Image::truncate();
        Image::unguard();
        factory(Image::class, 1)->create();
        Image::reguard();
    }
}
