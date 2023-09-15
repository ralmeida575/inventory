<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descricoes_hardware extends Model
{
    protected $table = 'descricoes_hardware';
    protected $fillable = ['descricao_texto', 'redes_id', 'data_comentario', 'agente_hardware','alteracoes'];

    use HasFactory;

    public function hardware() 
    {

        return $this->belongsTo('App\Models\hardware');
    }
}
