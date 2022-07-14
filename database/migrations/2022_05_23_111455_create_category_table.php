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
      
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            
            $table->timestamps();


            // -----FOR ONE TO MANY REALTIONSHIP
            // $table->string('name',255);
            // $table->string('android_version',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
