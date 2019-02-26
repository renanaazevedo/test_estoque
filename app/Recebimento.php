<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    protected $table = 'tbl_recebimentos';
    protected $primaryKey = 'recebimento_id';

    public function produtos () {
        return $this->belongsToMany('App\Produto', 'tbl_recebimentos_produtos', 'recebimento_id', 'produto_id')
            ->withPivot('recebimento_produto_quantidade');
    }
}
