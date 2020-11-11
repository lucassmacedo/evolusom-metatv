<?php

use Illuminate\Http\Request;

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


//Route::get('/vendas', function () {
//
//    return [
//        [
//            'nome'               => 'GLEISON CROGE',
//            'atendente'          => 17,
//            'parcial'            => 3.837,
//            'mensal'             => 0.209,
//            'representatividade' => 0.151,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'LUCIANO OTAVIO',
//            'atendente'          => 11,
//            'parcial'            => 3.837,
//            'mensal'             => 0.209,
//            'representatividade' => 0.151,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//
//            'nome'               => 'JANAINA FRIGERI',
//            'atendente'          => 12,
//            'parcial'            => 3.137,
//            'mensal'             => 0.309,
//            'representatividade' => 0.251,
//            'nclientes'          => 9,
//            'nclientesm'         => 51,
//            'cabeca'             => 0000000000,
//            'atualizacao'        => now()->toDateTimeString(),
//        ]
//    ];
//});
//
//Route::get('/produtos', function () {
//
//    return [
//        [
//            'produto_codigo'    => 141111,
//            'produto_nome'      => 'ROTEADOR TP-LINK WIRELESS TL-WR829N 300MBPS 2 ANTENAS 2LAN',
//            'fabricnate_codigo' => 963,
//            'fabricnate_nome'   => 'EVUS',
//            'grupo'             => 'Cabos',
//            'resumo'            => 'Cabo Evus C-003 VGA 1,5M com Blister Filtros HD15M x HD15M Azul',
//            'pedidos'           => 10,
//            'total'             => 255.55,
//            'atualizacao'       => now()->toDateTimeString(),
//        ],
//        [
//            'produto_codigo'    => 141111,
//            'produto_nome'      => 'ROTEADOR TP-LINK WIRELESS TL-WR829N 300MBPS 2 ANTENAS 2LAN',
//            'fabricnate_codigo' => 963,
//            'fabricnate_nome'   => 'EVUS',
//            'grupo'             => 'Cabos',
//            'resumo'            => 'Cabo Evus C-003 VGA 1,5M com Blister Filtros HD15M x HD15M Azul',
//            'pedidos'           => 10,
//            'total'             => 255.55,
//            'atualizacao'       => now()->toDateTimeString(),
//        ],
//        [
//            'produto_codigo'    => 141111,
//            'produto_nome'      => 'ROTEADOR TP-LINK WIRELESS TL-WR829N 300MBPS 2 ANTENAS 2LAN',
//            'fabricnate_codigo' => 963,
//            'fabricnate_nome'   => 'EVUS',
//            'grupo'             => 'Cabos',
//            'resumo'            => 'Cabo Evus C-003 VGA 1,5M com Blister Filtros HD15M x HD15M Azul',
//            'pedidos'           => 10,
//            'total'             => 255.55,
//            'atualizacao'       => now()->toDateTimeString(),
//        ]
//    ];
//});
//
//Route::get('/equipes', function () {
//
//    return [
//        [
//            'codigo'             => 48,
//            'nome'               => 'MARCOS',
//            'faturado'           => 1560.00,
//            'meta'               => 3600.00,
//            'meta_clientes'      => 300,
//            'clientes_atendidos' => 290,
//            'percentual'         => 0.0667,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//            'codigo'             => 69,
//            'nome'               => 'VINICIUS',
//            'faturado'           => 1160.00,
//            'meta'               => 2600.00,
//            'meta_clientes'      => 200,
//            'clientes_atendidos' => 114,
//            'percentual'         => 0.0167,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//            'codigo'             => 69,
//            'nome'               => 'VINICIUS',
//            'faturado'           => 1160.00,
//            'meta'               => 2600.00,
//            'meta_clientes'      => 200,
//            'clientes_atendidos' => 114,
//            'percentual'         => 0.0167,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//            'codigo'             => 69,
//            'nome'               => 'VINICIUS',
//            'faturado'           => 1160.00,
//            'meta'               => 2600.00,
//            'meta_clientes'      => 200,
//            'clientes_atendidos' => 114,
//            'percentual'         => 0.0167,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//            'codigo'             => 69,
//            'nome'               => 'VINICIUS',
//            'faturado'           => 1160.00,
//            'meta'               => 2600.00,
//            'meta_clientes'      => 200,
//            'clientes_atendidos' => 114,
//            'percentual'         => 0.0167,
//            'atualizacao'        => now()->toDateTimeString(),
//        ],
//        [
//            'codigo'             => 69,
//            'nome'               => 'VINICIUS',
//            'faturado'           => 1160.00,
//            'meta'               => 2600.00,
//            'meta_clientes'      => 200,
//            'clientes_atendidos' => 114,
//            'percentual'         => 0.0167,
//            'atualizacao'        => now()->toDateTimeString(),
//        ]
//    ];
//});
//Route::get('/meta-fabricante', function () {
//
//    return [
//        [
//            'vendedor_codigo' => 19,
//            'vendedor_nome'   => 'ALESSANDRO PAIVA',
//            'total_clientes'  => 10,
//            'faturamento'     => 3600.00,
//            'pontos'          => '200.00',
//            'atualizacao'     => now()->toDateTimeString(),
//        ],
//        [
//            'vendedor_codigo' => 18,
//            'vendedor_nome'   => 'JUSSARA FERTONANI',
//            'total_clientes'  => 5,
//            'faturamento'     => 1200.00,
//            'pontos'          => '100.00',
//            'atualizacao'     => now()->toDateTimeString(),
//        ]
//    ];
//});
