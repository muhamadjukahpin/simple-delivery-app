<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_ships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('port_id');
            $table->foreign('port_id')->references('id')->on('ports');
            $table->unsignedBigInteger('to_port_id')->nullable();
            $table->foreign('to_port_id')->references('id')->on('ports');
            $table->string('name');
            $table->enum('status', ['sailing', 'not sailing']);
            $table->enum('is_available', ['true', 'false']);
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
        Schema::dropIfExists('cargo_ships');
    }
}
