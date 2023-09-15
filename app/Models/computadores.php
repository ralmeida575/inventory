<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class computadores extends Model
{
    protected $table = 'computadores';
    protected $fillable = ['nome','id'];

    use HasFactory;

public function descricoes_computadores() {

return $this->hasMany('App\Models\descricoes_computadores');
}

}
