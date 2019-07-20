<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('admission');
            $table->unsignedBigInteger('room_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->timestamps();
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
