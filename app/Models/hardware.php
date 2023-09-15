<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hardware extends Model
{
    protected $table = 'hardware';
    protected $fillable = ['nome', 'id'];

    use HasFactory;

    public function descricoes_hardware() {

        return $this->hasMany('App\Models\descricoes_hardware');

        }
}
