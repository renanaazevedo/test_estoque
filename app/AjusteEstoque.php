<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjusteEstoque extends Model
{
    protected $table = 'tbl_ajustes_estoque';
    protected $primaryKey = 'ajuste_id';

    public function produto () {
        return $this->belongsTo('App\Produto', 'produto_id', 'produto_id');
    }
}
