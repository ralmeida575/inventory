<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{

    protected $table = 'faq';
    protected $fillable = ['titulo','id'];
    use HasFactory;

    public function descricoes_faq() {

        return $this->hasMany('App\Models\descricoes_faq');

        }
}
