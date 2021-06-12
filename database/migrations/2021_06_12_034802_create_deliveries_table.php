<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('sender');
            $table->unsignedBigInteger('sender_country');
            $table->foreign('sender_country')->references('id')->on('countries');
            $table->text('sender_address');
            $table->string('receiver');
            $table->unsignedBigInteger('receiver_country');
            $table->foreign('receiver_country')->references('id')->on('countries');
            $table->text('receiver_address');
            $table->unsignedBigInteger('container_id');
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('cargo_ship_id');
            $table->unsignedBigInteger('port');
            $table->foreign('port')->references('id')->on('ports');
            $table->unsignedBigInteger('to_port');
            $table->foreign('to_port')->references('id')->on('ports');
            $table->foreign('cargo_ship_id')->references('id')->on('cargo_ships')->onDelete('cascade')->onUpdate('cascade');
            $table->double('ppn');
            $table->double('price');
            $table->double('total');
            $table->string('status');
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
        Schema::dropIfExists('deliveries');
    }
}
