<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $table = 'tbl_saidas';
    protected $primaryKey = 'saida_id';

    public function produtos () {
        return $this->belongsToMany('App\Produto', 'tbl_saidas_produtos', 'saida_id', 'produto_id')
            ->withPivot('saida_produto_quantidade');
    }
}
