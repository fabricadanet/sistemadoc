<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dependente extends Model
{
    use HasFactory;
    protected $table = 'dependentes';
    protected $fillabe = ['user_id', 'nome', 'data_nascimento', 'parentesco', 'created_at','updated_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}