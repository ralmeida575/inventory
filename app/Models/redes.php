<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class redes extends Model
{
    protected $table = 'redes';
    protected $fillable = ['nome','id' ,'tag','marca', 'modelo','end_rede','patrimonio'];
    use HasFactory;

    public function descricoes_redes() {

        return $this->hasMany('App\Models\descricoes_redes');
        }
}
