<?php

use Illuminate\Http\Request;

use App\Produto;
use App\Http\Resources\ProdutoResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('saldo_estoque', function () {
    return response()->json(App\Produto::all());
});

Route::get('rastreamento_produto/{produto_id}', function ($produto_id) {
    return new ProdutoResource(Produto::find($produto_id));
});
