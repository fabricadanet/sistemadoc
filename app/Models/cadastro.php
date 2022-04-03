<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cadastro extends Model
{
    use HasFactory;
    protected $table = 'cadastros';
    protected $fillable = ['user_id', 'telefone','celular','mae','pai', 'rg', 'cpf','pis', 'data_nascimento','sexo','estado_civil','nacionalidade','naturalidade','cep', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado','matricula_cc','matricula_xla','cargo_cc','data_admissao_cc','data_admissao_xla','cargo_xla','tel_comercial_cc','tel_comercial_xla','email_comercial_cc','email_comercial_xla','autorizacao_debito','funcao','turnos_cc','turnos_xla','area'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}