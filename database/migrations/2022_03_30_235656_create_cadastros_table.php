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
        Schema::create('cadastros', function (Blueprint $table) {
        $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nome');
            $table->date('data_associacao')->default(now());
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('mae');
            $table->string('pai')->nullable();
            $table->string('rg');
            $table->string('cpf');
            $table->string('pis')->nullable();
            $table->date('data_nascimento');
            $table->enum('sexo', ['masculino', 'feminino']);
            $table->enum('estado_civil', ['solteiro(a)', 'casado(a)', 'divorciado(a)', 'viuvo(a)']);
            $table->string('nacionalidade')->default('brasileiro(a)')->nullable();
            $table->string('naturalidade');
            $table->string('logradouro');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado');
            $table->string('matricula_cc')->nullable();
            $table->string('matricula_xla')->nullable();
            $table->string('cargo_cc')->nullable();
            $table->string('cargo_xla')->nullable();
            $table->date('data_admissao_cc')->nullable();
            $table->date('data_admissao_xla')->nullable();
            $table->string('tel_comercial_cc')->nullable();
            $table->string('tel_comercial_xla')->nullable();
            $table->string('email_comercial_cc')->nullable();
            $table->string('email_comercial_xla')->nullable();
            $table->enum('autorizacao_debito', ['autorizado_CC', 'autorizado_xla','pendente'])->default('pendente');
            $table->string('funcao')->nullable();
            $table->string('area')->nullable();
            $table->string('turnos_cc')->nullable();
            $table->string('turnos_xla')->nullable();
            $table->string('autorizacao')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cadastros');
    }
};
