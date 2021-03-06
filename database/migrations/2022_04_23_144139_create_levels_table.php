<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('levels', function (Blueprint $table) {
            $table->id();
            $table->enum('level',['bachaelor','master','pHD']);
            $table->enum('year',['first','second','third','fourth', 'sixth', 'fifth','seventh','eigth','ninth','tenth']);
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
        Schema::dropIfExists('levels');
    }
}
