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
        Schema::create('alumni_event', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumni_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->timestamps();

            $table->foreign('alumni_id')->references('id')->on('alumnis')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('event_id')->references('id')->on('events')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni_event');
    }
};
