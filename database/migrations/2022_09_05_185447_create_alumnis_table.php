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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('maritial_status');
            $table->string('blood_group');
            $table->boolean('donate_blood')->default(0);
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profession')->nullable();
            $table->string('field')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_address')->nullable();
            $table->string('passing_year');
            $table->float('cgpa');
            $table->integer('batch');
            $table->string('student_id'); 
            $table->string('image'); 
            $table->string('status')->default('Inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('alumnis');
    }
};
