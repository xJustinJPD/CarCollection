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
        Schema::create('car_owner', function (Blueprint $table) {
            $table->id();
            // inheriting ID's from owner and cr table
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('car_id');


            // teling the database which data each foreign key represents
            $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owner_car');
    }
};
