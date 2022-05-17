<?php

namespace App\Http\Controllers;

use App\AcompanhamentoMeta;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use function foo\func;

class StaterkitController extends Controller
{

  /**
   * @var \GuzzleHttp\Client
   */
  private $client;
  /**
   * @var \Psr\Http\Message\ResponseInterface
   */
  private $dias_uteis;

  /**
   * StaterkitController constructor.
   */
  public function __construct()
  {
    $this->client = new \GuzzleHttp\Client(['base_uri' => env('APP_API_URL')]);


    try {

      $this->dias_uteis = cache()->remember('metatvdiasuteis', 60 * 60 * 24, function () {

        $dates = [
          'starts' => now()->startOfMonth()->format('d/m/Y'),
          'ends'   => now()->endOfMonth()->format('d/m/Y')
        ];

        $query = [
          'query' => [
            'dataInicial' => $dates['starts'],
            'dataFinal'   => $dates['ends']
          ],
          'auth'  => [
            env('APP_API_USERNAME'),
            env('APP_API_PASSWORD')
          ]
        ];
        $dias_uteis = $this->client->get('metatvdiasuteis', $query);

        return collect(json_decode($dias_uteis->getBody()->getContents()));
      });

    } catch (\Exception $exception) {
      cache()->forget('metatvdiasuteis');
    }


  }

  // Fixed Layout
  public function ranking_vendas()
  {

    $theme = 'evolusom';
    $next = route('capilaridade');
    $timeout = 30000;

    try {

      $dates = [
        'starts' => now()->startOfMonth()->format('d/m/Y'),
        'ends'   => now()->endOfMonth()->format('d/m/Y')
      ];

      // se for o primeiro dia útil do mês
      if (Carbon::parse($this->dias_uteis->first()->data)->toDateString() == now()->toDateString()) {
        $dates = [
          'starts' => now()->subMonth(1)->startOfMonth()->format('d/m/Y'),
          'ends'   => now()->subMonth(1)->endOfMonth()->format('d/m/Y')
        ];
      }

      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
        ],
        'auth'  => [
          env('APP_API_USERNAME'),
          env('APP_API_PASSWORD')
        ]
      ];

      $usersToIgnore = [
        32,
        48,
        55,
        69,
        3,
        5,
        9,
        27,
        31,
        97,
        6,
        22,
        50,
        14,
        26,
        2,
        4,
        20,
        24,
        25,
        28,
        30,
        37,
        51,
        52,
        53,
        54,
        80,
        82,
        83,
        84,
        85,
        86,
        87,
        88,
        89,
        90,
        91,
        92,
        93,
        94,
        95,
        96,
        98,
        99,
        100,
        101,
        201,
        202,
        203,
        204,
        205,
        206,
        207,
      ];


      $response_month = $this->client->get('metatvfaturamento', $query);
      $response_month = collect(json_decode($response_month->getBody()->getContents()));


      // se não for o primeiro dia útil do mês
      if (Carbon::parse($this->dias_uteis->first()->data)->toDateString() <> now()->toDateString()) {
        $query['query']['dataFinal'] = now()->format('d/m/Y');
      }


      $response_parcial = $this->client->get('metatvfaturamento', $query);
      $response_parcial = collect(json_decode($response_parcial->getBody()->getContents()))->keyBy('codUsur');

      $data['porcentagem'] = $response_month->map(function ($item) use ($response_parcial) {
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        $parcial = $response_parcial[$item->codUsur];
        $item->projetado = $item->vlVenda > 0 && $parcial->vlMeta > 0 ? round(($item->vlVenda / $parcial->vlMeta) * 100, 2) : 0;
        return $item;
      })
        ->whereNotIn('codUsur', $usersToIgnore)
        ->where('vlMeta', '<>', 0)
        ->take(50)
        ->sortByDesc('atingido')
        ->sortByDesc('projetado');


      $vendas = $response_month->map(function ($item) {
        $item->atendidos = $item->numCliAtendidos > 0 && $item->numCliPrev > 0 ? round(($item->numCliAtendidos / $item->numCliPrev) * 100, 2) : 0;
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        return $item;
      })
        ->whereNotIn('codUsur', $usersToIgnore)
        ->sortByDesc('vlVenda');

      $data['vendas'] = $vendas->take(3);

      $metas_atingidas = $vendas->where("atendidos", '>', 99.99)
        ->where("atingido", '>', 99.99);


      foreach ($metas_atingidas as $item) {
        AcompanhamentoMeta::firstOrCreate([
          "vendedor" => $item->codUsur,
          "nome"     => $item->nome,
          "mes"      => date('m'),
          "ano"      => date('Y'),
        ]);
      }

      if ($metas_atingidas->isNotEmpty()) {
        $next = route('meta_atingida');
      }

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }

    return view('pages.ranking_vendas', compact('next', 'data', 'theme', 'dates', 'timeout'));
  }

  // Fixed Layout
  public function meta_atingida()
  {

    // pega proxima a ser mostrada depois da ultima mostrada
    $ultima_mostrada = AcompanhamentoMeta::whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where("ultima_mostrada", true)
      ->first();


    // pega proxima a ser mostrada depois da ultima mostrada
    $metas_atingidas_mostrar = AcompanhamentoMeta::whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'));

    if (!is_null($ultima_mostrada)) {
      $metas_atingidas_mostrar->where('id', '>', $ultima_mostrada->id);
    }

    $metas_atingidas_mostrar = $metas_atingidas_mostrar->orderBy('id', 'asc')->first();


    if (is_null($metas_atingidas_mostrar)) {
      $metas_atingidas_mostrar = AcompanhamentoMeta::whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->orderBy('id', 'asc')
        ->first();
    }

    if ($metas_atingidas_mostrar) {
      $metas_atingidas_mostrar->ultima_mostrada = true;
      $metas_atingidas_mostrar->save();
    }


    if ($ultima_mostrada) {
      $ultima_mostrada->ultima_mostrada = false;
      $ultima_mostrada->save();
    }

    $max_date = Carbon::parse($metas_atingidas_mostrar->created_at)->addDay(1)->endOfDay();
    $metas_atingidas_mostrar->passou = now()->gt($max_date);

    $theme = 'evolusom';
    $next = route('meta_atingida2');
    $timeout = 30000;

    return view('pages.acompanhamento_meta', compact('next', 'metas_atingidas_mostrar', 'theme', 'timeout'));
  }

  public function meta_atingida2()
  {
    // pega proxima a ser mostrada depois da ultima mostrada
    $vendedores = AcompanhamentoMeta::whereMonth('created_at', date('m'))
      ->whereYear('ano', date('Y'))
      ->paginate(10);


    if ($vendedores->currentPage() == $vendedores->lastPage()) {
      $next = route('capilaridade');
    } else {
      $next = route('meta_atingida2', ['page' => $vendedores->currentPage() + 1]);
    }
    $theme = 'evolusom';
    $timeout = 30000;

    return view('pages.meta_atingida', compact('next', 'vendedores', 'theme', 'timeout'));
  }

  // Fixed Layout
  public function ranking_capilaridade()
  {
    $next = route('meta_equipes');
    $timeout = 15000;
    $theme = 'evolusom';

    try {

      $dates = [
        'starts' => now()->startOfMonth()->format('d/m/Y'),
        'ends'   => now()->endOfMonth()->format('d/m/Y')
      ];

      // se for o primeiro dia útil do mês
      if (Carbon::parse($this->dias_uteis->first()->data)->toDateString() == now()->toDateString()) {
        $dates = [
          'starts' => now()->subMonth(1)->startOfMonth()->format('d/m/Y'),
          'ends'   => now()->subMonth(1)->endOfMonth()->format('d/m/Y')
        ];
      }

      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
        ],
        'auth'  => [
          env('APP_API_USERNAME'),
          env('APP_API_PASSWORD')
        ]
      ];

      $response = $this->client->get('metatvfaturamento', $query);
      $response = collect(json_decode($response->getBody()->getContents()));

      $data = $response->map(function ($item) {
        $item->atingido = $item->numCliAtendidos > 0 && $item->numCliPrev > 0 ? round(($item->numCliAtendidos / $item->numCliPrev) * 100, 2) : 0;
        return $item;
      })->where('vlMeta', '<>', 0)
        ->take(50)
        ->sortByDesc('numCliAtendidos');

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }


    return view('pages.ranking_capilaridade', compact('data', 'next', 'theme', 'dates', 'timeout'));
  }

  // Fixed Layout
  public function produtos_mes()
  {
    $theme = 'evolusom';
    $timeout = 15000;
    $title = "TOP 10 Produtos mais vendidos no Mês";
    $next = route('produtos-dia');
    return view('pages.ranking_produtos', compact('title', 'next', 'theme', 'timeout'));
  }

  // Fixed Layout
  public function produtos_dia()
  {
    $theme = 'evolusom';
    $timeout = 30000;
    $title = "TOP 10 Produtos mais vendidos no Dia";
    $next = route('meta_equipes');
    return view('pages.ranking_produtos', compact('title', 'next', 'theme', 'timeout'));
  }

  // Fixed Layout
  public function meta_equipes()
  {
    $title = "Meta Equipes";
    $next = route('evus');
    $theme = 'evolusom';
    $timeout = 30000;

    try {

      $dates = [
        'starts' => now()->startOfMonth()->format('d/m/Y'),
        'ends'   => now()->endOfMonth()->format('d/m/Y')
      ];
      // se for o primeiro dia útil do mês
      if (Carbon::parse($this->dias_uteis->first()->data)->toDateString() == now()->toDateString()) {
        $dates = [
          'starts' => now()->subMonth(1)->startOfMonth()->format('d/m/Y'),
          'ends'   => now()->subMonth(1)->endOfMonth()->format('d/m/Y')
        ];
      }

      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
        ],
        'auth'  => [
          env('APP_API_USERNAME'),
          env('APP_API_PASSWORD')
        ]
      ];

      $response_dias_uteis = $this->client->get('metatvdiasuteis', $query);
      $response_dias_uteis = collect(json_decode($response_dias_uteis->getBody()->getContents()))->map(function ($item) {
        $item->data_raw = Carbon::parse($item->data)->format('Ymd');
        return $item;
      });


      $total = (int)$response_dias_uteis->count();
      $restantes = (int)$response_dias_uteis->where('data_raw', '>', date('Ymd'))->count();

      $expectativa = $restantes > 0 ? round((($total - $restantes) / $total) * 100, 2) : 100;

      $data['dias_uteis'] = [
        'expectativa' => $expectativa
      ];


      $response_month = $this->client->get('metatvequipe', $query);
      $response_month = collect(json_decode($response_month->getBody()->getContents()));

      $query['query']['dataFinal'] = now()->format('d/m/Y');

      $response_parcial = $this->client->get('metatvequipe', $query);
      $response_parcial = collect(json_decode($response_parcial->getBody()->getContents()));

      $vlVendaGeral = $response_month->where('vlMeta', '>', 0)->sum('vlVenda');

      $vlMetaGeral = $response_month->sum('vlMeta');
      $numCliAtendidos = $response_month->sum('numCliAtendidos');
      $numCliPrev = $response_month->sum('numCliPrev');

      $vlVendaParcial = $response_parcial->where('vlMeta', '>', 0)->sum('vlVenda');
      $vlMetaParcial = $response_parcial->sum('vlMeta');

      $data['geral'] = [
        'faturado'           => $vlVendaGeral,
        'faturado_parcial'   => $vlVendaParcial,
        'meta'               => $vlMetaGeral,
        'meta_parcial'       => $vlMetaParcial,
        'meta_clientes'      => round($response_month->sum('numCliPrev')),
        'clientes_atendidos' => $response_month->sum('numCliAtendidos'),
        'realizado'          => $vlVendaGeral > 0 && $vlMetaGeral > 0 ? round($vlVendaGeral / $vlMetaGeral * 100, 2) : 0,
        'projecao'           => $vlVendaGeral > 0 && $vlMetaParcial > 0 ? round($vlVendaGeral / $vlMetaParcial * 100, 2) : 0,
        'capilaridade'       => $numCliAtendidos > 0 && $numCliPrev > 0 ? round($numCliAtendidos / round($numCliPrev) * 100, 2) : 0,
      ];

      $data['items'] = $response_month->map(function ($item) {
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        $item->per_clientes = $item->numCliAtendidos > 0 && $item->numCliPrev > 0 ? round(($item->numCliAtendidos / $item->numCliPrev) * 100, 2) : 0;

//        $parcial = $response_parcial[$item->codUsur];
//        $item->projetado = $parcial->vlVenda > 0 && $parcial->vlMeta > 0 ? round(($item->vlVenda / $parcial->vlMeta) * 100, 2) : 0;
        return $item;
      })
        ->where('vlMeta', '>', 0)
        // Retirado Guilherme e Diversos a Pedido do Rodrigo
        ->whereNotIn('codSupervisor', [4, 8])
        ->sortByDesc('atingido');

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }


    return view('pages.meta_equipes', compact('title', 'next', 'theme', 'data', 'timeout', 'dates'));
  }

  // Fixed Layout
  public function evos()
  {

    $theme = 'evus';
    $title = "Meta Evus";

    $next = route('home');

    if (Carbon::now()->lt(Carbon::parse("2022-04-30 00:00:00"))) {
      $next = route('campanha-temporaria1');
    }

    $timeout = 30000;

    try {

      $dates = [
        'starts' => now()->startOfWeek()->format('d/m/Y'),
        'ends'   => now()->endOfWeek()->subDay(1)->format('d/m/Y')
      ];

      if (request()->has('starts') && request()->has('ends')) {
        $dates = [
          'starts' => request()->input('starts'),
          'ends'   => request()->input('ends')
        ];
      }

      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
        ],
        'auth'  => [
          env('APP_API_USERNAME'),
          env('APP_API_PASSWORD')
        ]
      ];

      // usuários a serem ignorados a pedido do Rodrigo Gonçalves
      $usersToIgnoreGeral = [
        3,
        5,
        9,
        27,
        31,
        97,
        6,
        22,
        50,
        14,
        26,
        2,
        4,
        20,
        24,
        25,
        28,
        30,
        37,
        51,
        52,
        53,
        54,
        80,
        82,
        83,
        84,
        85,
        86,
        87,
        88,
        89,
        90,
        91,
        92,
        93,
        94,
        95,
        96,
        98,
        99,
        100,
        101,
        201,
        202,
        203,
        204,
        205,
        206,
        207,
      ];

      $response = $this->client->get('metatvevus', $query);
      $response = collect(json_decode($response->getBody()->getContents()))->map(function ($item) {
        $item->avatar = sprintf("/images/vendedores/%s.png", $item->codUsur);
        return $item;
      })->whereNotIn('codUsur', $usersToIgnoreGeral);


      $data['geral'] = $response->sortByDesc('numCliAtendidos');


      $data['capilaridade'] = $response->sortByDesc('numCliAtendidos')
//        ->whereNotIn('codUsur', [1])
        ->take(10);

      $data['faturamento'] = $response->sortByDesc('faturamentoEvus')
        ->take(10);


      $data['pontuacao'] = $response->sortByDesc('pontuacao')
//        ->whereNotIn('codUsur', [1])
        ->take(10);

//      $text = ' < table cellpadding = "3px" border = "1px" style = "width: 90%;" ><tbody > ';
//
//      foreach ($data['pontuacao'] as $item) {
//
//        $text .= "<tr><td>" . $item->nome . "</td><td>" . $item->pontuacao . "</td><td>" . $item->faturamentoEvus . "</td></tr>" ;
//      }
//
//      $text.="</tbody></table>";

//      return $data['pontuacao'];

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }

    return view('pages.evos', compact('title', 'next', 'theme', 'data', 'timeout', 'dates'));
  }

  public function temporario2()
  {
    $next = route('home');

    $timeout = 30000;
    $image = asset('images/campanhas/campanha2.jpg');
    return view('pages.campanha_temporaria1', compact('timeout', 'next', 'image'));
  }

  public function temporario1()
  {
    $next = route('home');
    if (Carbon::now()->lt(Carbon::parse("2022-01-31 20:00:00"))) {
      $next = route('campanha-temporaria2');
    }

    $timeout = 30000;
    $image = asset('images/campanhas/campanha1.png');
    return view('pages.campanha_temporaria1', compact('timeout', 'next', 'image'));
  }


  public function voice()
  {

    $voice = new Client();
//    $voice = json_decode($voice->get("https://api.npoint.io/444ce9712a32891b4deb")->getBody()->getContents(), true);
    $voice = json_decode($voice->get("http://192.168.1.160/dashboard/ajax/dados/getAsteriskAMI.php")->getBody()->getContents(), true);
    $dados = collect($voice);

    $channels = collect($dados['CoreShowChannelsAction'])->mapToGroups(function ($item) {
      return ["{$item['linkedid']}" => $item];
    });

    $setores = $dados['setores'][13];

    $ramais['disponiveis'] = count(array_filter($dados['DeviceStateListAction'], function ($item) use ($setores) {
      $regex = preg_replace("/^.*\//", "", $item['device']);
      return (in_array($regex, $setores)) and $item['state'] == "NOT_INUSE";
    }));

    $ramais['ocupados'] = count(array_filter($dados['DeviceStateListAction'], function ($item) use ($setores) {
      $regex = preg_replace("/^.*\//", "", $item['device']);
      return (in_array($regex, $setores)) and $item['state'] == "BUSY";
    }));
    $ramais['indisponiveis'] = count(array_filter($dados['DeviceStateListAction'], function ($item) use ($setores) {
      $regex = preg_replace("/^.*\//", "", $item['device']);
      return (in_array($regex, $setores)) and $item['state'] == "UNAVAILABLE";
    }));


    $ramais['efetuadas'] = 0;
    $ramais['recebidas'] = 0;

    $acEfetuadas = [2, 3, 4, 5, 6, 7];

    $acRecebidas = [11, 12, 13, 14, 15];
    $channels = $channels->sortKeys();

    foreach ($channels as $key => $channel) {


      $agente = 0;
      $cliente = 0;

      $channel = $channel->toArray();
      // sort array by column
      usort($channel, function ($a, $b) {
        return $a['linkedid'] - $b['linkedid'];
      });


      if (in_array($channels[$key][0]['accountcode'], $acRecebidas)) {
        $agente = $channels[$key][count($channels[$key]) - 1]['channel'];
      } elseif (in_array($channels[$key][0]['accountcode'], $acEfetuadas)) {
        $agente = count($channels[$key]) == 2 ? $channels[$key][0]['channel'] : $channels[$key][count($channels[$key]) - 1]['channel'];
      } else {
        $agente = 0;
      }

      $agente = preg_replace("/^.*\//", "", $agente);
      $agente = preg_replace("/-.*$/", "", $agente);

      if (in_array($agente, $dados['filas']["Vendas"])) {
        if (in_array($channels[$key][0]['accountcode'], $acRecebidas)) {
          $ramais['recebidas'] = $ramais['recebidas'] + 1;
        } else {
          $ramais['efetuadas'] = $ramais['efetuadas'] + 1;
        }
      }
    }

    return $ramais;
  }

  public function iberostart()
  {

    $title = "Meta Equipes";
    $next = null;
    $theme = 'evolusom';
    $timeout = 30000;


    // cache 30 mins
    Cache::forget('iberostart');
    $data = Cache::remember('iberostart', 60 * 10, function () {
      $faturamento = collect(DB::connection('oracle')->select("
    SELECT  PCPEDC.CODUSUR   AS CODIGO,
            PCUSUARI.NOME        AS NOME,
            SUM(CASE
               WHEN NVL(PCPEDI.BONIFIC, 'N') = 'N' THEN
                   DECODE(PCPEDC.CONDVENDA,
                          5,
                          0,
                          6,
                          0,
                          11,
                          0,
                          12,
                          0,
                          NVL(PCPEDI.VLSUBTOTITEM,
                              (DECODE(NVL(PCPEDI.TRUNCARITEM, 'N'),
                                      'N',
                                      ROUND((NVL(PCPEDI.QT, 0)) * (NVL(PCPEDI.PVENDA, 0)), 2),
                                      TRUNC((NVL(PCPEDI.QT, 0)) * (NVL(PCPEDI.PVENDA, 0)), 2)))))
               ELSE
                   0
           END)                        VLVENDA,
       COUNT(DISTINCT (PCPEDC.CODCLI)) QTCLIPOS
FROM PCPEDI,
     PCPEDC,
     PCUSUARI,
     PCPRODUT,
     PCDEPTO,
     PCCLIENT,
     PCPRACA,
     PCSUPERV,
     PCMARCA
WHERE PCPEDI.NUMPED = PCPEDC.NUMPED
  AND PCPEDC.CODUSUR = PCUSUARI.CODUSUR
  AND PCPEDC.CODSUPERVISOR = PCSUPERV.CODSUPERVISOR
  AND PCPEDI.CODPROD = PCPRODUT.CODPROD
  AND PCPRODUT.CODEPTO = PCDEPTO.CODEPTO
  AND PCPEDC.CODCLI = PCCLIENT.CODCLI
  AND PCPEDC.CODPRACA = PCPRACA.CODPRACA
  AND PCPEDC.DTCANCEL IS NULL
  AND PCPEDC.DTFAT BETWEEN '2022-05-01' AND '2022-09-30'
  AND PCPEDC.CODFILIAL IN (1, 2, 3, 4)
  AND PCPEDC.POSICAO = 'F'
  AND PCPEDC.CONDVENDA IN (1, 7)
  AND PCPRODUT.CODMARCA = PCMARCA.CODMARCA
  AND PCMARCA.CODMARCA = '381'
  AND PCPEDC.CODUSUR NOT IN (200, 1)
  AND PCPEDC.CODCOB <> 'VET'
GROUP BY PCPEDC.CODUSUR, PCUSUARI.NOME
ORDER BY VLVENDA DESC
"))->take(8);

      $capilaridade = collect(DB::connection('oracle')->select("
    SELECT  PCPEDC.CODUSUR   AS CODIGO,
            PCUSUARI.NOME        AS NOME,
            SUM(CASE
               WHEN NVL(PCPEDI.BONIFIC, 'N') = 'N' THEN
                   DECODE(PCPEDC.CONDVENDA,
                          5,
                          0,
                          6,
                          0,
                          11,
                          0,
                          12,
                          0,
                          NVL(PCPEDI.VLSUBTOTITEM,
                              (DECODE(NVL(PCPEDI.TRUNCARITEM, 'N'),
                                      'N',
                                      ROUND((NVL(PCPEDI.QT, 0)) * (NVL(PCPEDI.PVENDA, 0)), 2),
                                      TRUNC((NVL(PCPEDI.QT, 0)) * (NVL(PCPEDI.PVENDA, 0)), 2)))))
               ELSE
                   0
           END)                        VLVENDA,
       COUNT(DISTINCT (PCPEDC.CODCLI)) QTCLIPOS
FROM PCPEDI,
     PCPEDC,
     PCUSUARI,
     PCPRODUT,
     PCDEPTO,
     PCCLIENT,
     PCPRACA,
     PCSUPERV,
     PCMARCA
WHERE PCPEDI.NUMPED = PCPEDC.NUMPED
  AND PCPEDC.CODUSUR = PCUSUARI.CODUSUR
  AND PCPEDC.CODSUPERVISOR = PCSUPERV.CODSUPERVISOR
  AND PCPEDI.CODPROD = PCPRODUT.CODPROD
  AND PCPRODUT.CODEPTO = PCDEPTO.CODEPTO
  AND PCPEDC.CODCLI = PCCLIENT.CODCLI
  AND PCPEDC.CODPRACA = PCPRACA.CODPRACA
  AND PCPEDC.DTCANCEL IS NULL
  AND PCPEDC.DTFAT BETWEEN '2022-05-01' AND '2022-09-30'
  AND PCPEDC.CODFILIAL IN (1, 2, 3, 4)
  AND PCPEDC.POSICAO = 'F'
  AND PCPEDC.CONDVENDA IN (1, 7)
  AND PCPRODUT.CODMARCA = PCMARCA.CODMARCA
  AND PCMARCA.CODMARCA = '381'
  AND PCPEDC.CODUSUR NOT IN (200, 1)
  AND PCPEDC.CODCOB <> 'VET'
GROUP BY PCPEDC.CODUSUR, PCUSUARI.NOME
ORDER BY QTCLIPOS DESC, VLVENDA DESC
"))->take(8);

      return ['faturamento' => $faturamento, 'capilaridade' => $capilaridade];
    });

    return view('pages.iberostar', compact('data', 'title', 'next', 'theme', 'timeout'));
  }
}
