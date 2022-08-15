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
        Schema::create('matricula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('cadastro_id')->nullable();
            $table->string('matricula')->nullable();
            $table->enum('cidade', ['Capão da Canoa', 'Xangri-lá'])->default('Capão da Canoa');
            $table->string('turnos')->nullable();
            $table->string('cargo')->nullable();
            $table->date('data_admissao')->nullable();
            $table->string('tel_comercial')->nullable();
            $table->string('email_comercial')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('matricula');
    }
};
