<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descricoes_computadores extends Model
{
    protected $table = 'descricoes_computadores';
    protected $fillable = ['descricao_texto', 'computadores_id', 'data_comentario', 'agente_computadores','alteracoes'];
    use HasFactory;
    
   

    public function computadores() 
    {

        return $this->belongsTo('App\Models\computadores');
    }
}
