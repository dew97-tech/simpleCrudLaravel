<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('price');
                $table->timestamps();
            });
    

        //    ----------For ONE TO MANY RELATIONSHIP
        // Schema::table('products', function (Blueprint $table) {
        //     $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
           
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
