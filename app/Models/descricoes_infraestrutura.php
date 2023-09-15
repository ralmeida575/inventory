<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descricoes_infraestrutura extends Model
{
    protected $table = 'descricoes_infraestrutura';
    protected $fillable = ['descricao_texto', 'data_comentario', 'agente_infraestrutura','alteracoes','infraestrutura_id'];
    use HasFactory;

    public function infraestrutura() 
    {

        return $this->belongsTo('App\Models\infraestrutura');
    }
}
