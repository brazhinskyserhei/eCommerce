<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',250);
            $table->text('description');
            $table->decimal('price',9,2)->unsigned();
            $table->decimal('old_price',9,2)->unsigned();
            $table->smallInteger('availability')->unsigned();
            $table->boolean('is_new');
            $table->boolean('is_sale');
            $table->json('features');
            $table->smallInteger('code')->unsigned();
            $table->smallInteger('discount')->unsigned();
            $table->smallInteger('rating')->unsigned();
            $table->unsignedBigInteger('image_id');
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
