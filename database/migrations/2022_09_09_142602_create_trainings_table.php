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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('topic');
            $table->string('reference_contact_name');
            $table->string('reference_contact_number');
            $table->longText('description');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('last_date');
            $table->string('location');
            $table->string('duration');
            $table->string('status');
            $table->string('image');
            $table->timestamps(); 

            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};
