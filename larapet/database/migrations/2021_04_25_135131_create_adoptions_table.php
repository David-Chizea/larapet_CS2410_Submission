<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();        
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('animal_id');
            $table->string('animal_name');
            $table->boolean('pending')->default('1');
            $table->boolean('approved')->default('0');
            $table->boolean('denied')->default('0');
            $table->string('status')->default('pending');
            $table->timestamps();
            
        });

        Schema::table('adoptions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('animal_id')->references('id')->on('animals');
            //$table->foreign('animal_name')->references('name')->on('animals');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoptions');
    }
}
