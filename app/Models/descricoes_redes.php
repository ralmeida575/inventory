<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descricoes_redes extends Model
{  
    protected $table = 'descricoes_redes';
    protected $fillable = ['descricao_texto', 'redes_id', 'data_comentario', 'agente_redes','alteracoes'];

    use HasFactory;

    public function redes() 
    {

        return $this->belongsTo('App\Models\redes');
    }
}
