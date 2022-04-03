<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autorizacao extends Model
{
    use HasFactory;
    protected $table = 'autorizacoes';
    protected $fillabe = ['user_id','cadastro_id','status', 'path','created_at','updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}