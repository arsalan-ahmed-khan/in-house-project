<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_workshops', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('type'); // Type of course/workshop
            $table->string('title'); // Title of the course/workshop
            $table->string('organizing_institute'); // Organizing institute name
            $table->string('location'); // Location of the course/workshop
            $table->string('duration'); // Duration of the course/workshop
            $table->date('start_date'); // Start date
            $table->date('end_date'); // End date
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->timestamps(); // Created at and Updated at columns

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_workshops');
    }
}
