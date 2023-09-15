<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class descricoes_faq extends Model
{
    protected $table = 'descricoes_faq';
    protected $fillable = ['descricao_texto', 'faq_id', 'data_comentario', 'agente_faq','alteracoes'];

    use HasFactory;

    public function faq() 
    {

        return $this->belongsTo('App\Models\faq');
    }
}
