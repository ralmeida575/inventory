<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infraestrutura extends Model
{
    protected $table = 'infraestrutura';
    protected $fillable = ['nome','id'];

    use HasFactory;

    public function descricoes_infraestrutura() {

        return $this->hasMany('App\Models\descricoes_infraestrutura');
        }
}
