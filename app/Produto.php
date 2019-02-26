<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tbl_produtos';
    protected $primaryKey = 'produto_id';

    public function recebimentos () {
        return $this->belongsToMany('App\Recebimento', 'tbl_recebimentos_produtos', 'produto_id', 'recebimento_id')
            ->withPivot('recebimento_produto_quantidade');
    }

    public function saidas () {
        return $this->belongsToMany('App\Saida', 'tbl_saidas_produtos', 'produto_id', 'saida_id')
            ->withPivot('saida_produto_quantidade');
    }

    public function ajustes () {
        return $this->hasMany('App\AjusteEstoque', 'produto_id', 'produto_id');
    }
}
