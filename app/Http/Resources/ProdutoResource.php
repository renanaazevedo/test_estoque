<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $movimentacoes = [];

        foreach ($this->recebimentos as $movimentacao) {
            $movimentacoes[] = [
                'codigo_movimentacao' => $movimentacao->recebimento_id,
                'movimentacao' => 'recebimento',
                'data_hora_movimentacao' => $movimentacao->recebimento_datahora,
                'quantidade_movimentada' => $movimentacao->pivot->recebimento_produto_quantidade,
            ];
        }

        foreach ($this->saidas as $movimentacao) {
            $movimentacoes[] = [
                'codigo_movimentacao' => $movimentacao->saida_id,
                'movimentacao' => 'saída',
                'data_hora_movimentacao' => $movimentacao->saida_datahora,
                'quantidade_movimentada' => $movimentacao->pivot->saida_produto_quantidade,
            ];
        }

        foreach ($this->ajustes as $movimentacao) {
            $movimentacoes[] = [
                'codigo_movimentacao' => $movimentacao->ajuste_id,
                'movimentacao' => $movimentacao->ajuste_tipo == 'E' ? 'ajuste de entrada' : 'ajuste de saída',
                'data_hora_movimentacao' => $movimentacao->ajuste_datahora,
                'quantidade_movimentada' => $movimentacao->ajuste_quantidade,
            ];
        }

        return [
            'codigo' => $this->produto_id,
            'descricao' => $this->produto_descricao,
            'movimentacoes' => $movimentacoes,
        ];
    }
}
