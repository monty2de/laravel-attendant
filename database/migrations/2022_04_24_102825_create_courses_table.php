<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');//levels have many courses
            $table->unsignedBigInteger('semester_id');//semester have many courses
            $table->string('name_ar')->nullable();
            $table->string('name_en');
            $table->string('code');
            $table->double('success')->nullable();
            $table->double('unit');
            $table->integer('total_hours')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
