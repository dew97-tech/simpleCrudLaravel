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
        if(!Schema::hasTable('products')) {

            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('details');
                // Categry New Column 
                // $table->unsignedBigInteger('category_id');
                // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->timestamps();
            });
    
        }
       
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign('lists_category_id_foreign');
        // $table->dropIndex('lists_category_id_index');
        // $table->dropColumn('category_id');
        Schema::dropIfExists('products');
    }
};
