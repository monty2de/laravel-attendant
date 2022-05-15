<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');//levels have many students
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->double('avg1')->nullable();
            $table->double('avg2')->nullable();
            $table->double('avg3')->nullable();
            $table->double('avg4')->nullable();
            $table->double('avg5')->nullable();
            $table->double('avg6')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('students');
    }
}
