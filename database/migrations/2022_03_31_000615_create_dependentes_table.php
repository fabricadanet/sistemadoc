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
        Schema::create('dependentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('cadastro_id')->nullable();
            $table->string('nome');
            $table->string('parentesco');
            $table->date('data_nascimento');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cadastro_id')->references('id')->on('cadastros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependentes');
    }
};
