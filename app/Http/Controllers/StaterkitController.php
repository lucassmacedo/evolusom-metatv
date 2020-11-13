<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Exception;
use function foo\func;

class StaterkitController extends Controller
{

  /**
   * @var \GuzzleHttp\Client
   */
  private $client;

  /**
   * StaterkitController constructor.
   */
  public function __construct()
  {
    $this->client = new \GuzzleHttp\Client(['base_uri' => env('APP_API_URL')]);
  }

  // Fixed Layout
  public function ranking_vendas()
  {

    $theme = 'evolusom';
    $next = route('capilaridade');

    try {
      $dates = [
        'starts' => now()->startOfMonth()->format('d/m/Y'),
        'ends'   => now()->endOfMonth()->format('d/m/Y')
      ];


      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
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

      $query['query']['dataFinal'] = now()->format('d/m/Y');

      $response_parcial = $this->client->get('metatvfaturamento', $query);
      $response_parcial = collect(json_decode($response_parcial->getBody()->getContents()))->keyBy('codUsur');

      $data['porcentagem'] = $response_month->map(function ($item) use ($response_parcial) {
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        $parcial = $response_parcial[$item->codUsur];
        $item->projetado = $parcial->vlVenda > 0 && $parcial->vlMeta > 0 ? round(($item->vlVenda / $parcial->vlMeta) * 100, 2) : 0;
        return $item;
      })
        ->whereNotIn('codUsur', $usersToIgnore)
        ->where('vlMeta', '<>', 0)
        ->take(50)
        ->sortByDesc('atingido')
        ->sortByDesc('projetado');


      $data['vendas'] = $response_month->map(function ($item) {
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        return $item;
      })->sortByDesc('vlVenda')
        ->take(3);

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }

    return view('pages.ranking_vendas', compact('next', 'data', 'theme', 'dates'));
  }

  // Fixed Layout
  public function ranking_capilaridade()
  {
    $next = route('evus');

    $theme = 'evolusom';

    try {

      $dates = [
        'starts' => now()->startOfMonth()->format('d/m/Y'),
        'ends'   => now()->endOfMonth()->format('d/m/Y')
      ];


      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
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


    return view('pages.ranking_capilaridade', compact('data', 'next', 'theme', 'dates'));
  }

  // Fixed Layout
  public function produtos_mes()
  {
    $theme = 'evolusom';

    $title = "TOP 10 Produtos mais vendidos no Mês";
    $next = route('produtos-dia');
    return view('pages.ranking_produtos', compact('title', 'next', 'theme'));
  }

  // Fixed Layout
  public function produtos_dia()
  {
    $theme = 'evolusom';

    $title = "TOP 10 Produtos mais vendidos no Dia";
    $next = route('meta_equipes');
    return view('pages.ranking_produtos', compact('title', 'next', 'theme'));
  }

  // Fixed Layout
  public function meta_equipes()
  {
    $title = "Meta Equipes";
    $next = route('home');
    $theme = 'evolusom';
    $client = new \GuzzleHttp\Client();
    $response = $client->get('http://metatv.evolusom.com.br/api/equipes');

    $data['items'] = collect(json_decode($response->getBody()->getContents()));

    $data['geral'] = [
      'faturado'           => $data['items']->sum('faturado'),
      'meta'               => $data['items']->sum('meta'),
      'meta_clientes'      => $data['items']->sum('meta_clientes'),
      'clientes_atendidos' => $data['items']->sum('clientes_atendidos'),
      'realizado'          => round($data['items']->sum('faturado') / $data['items']->sum('meta') * 100, 2),
      'capilaridade'       => round($data['items']->sum('clientes_atendidos') / $data['items']->sum('meta_clientes') * 100, 2),
    ];


    return view('pages.meta_equipes', compact('title', 'next', 'theme', 'data'));
  }

  // Fixed Layout
  public function evos()
  {
    $theme = 'evus';
    $title = "Meta Evus";
    $next = route('home');
    $next = null;
    try {

      $dates = [
        'starts' => now()->startOfWeek()->format('d/m/Y'),
        'ends'   => now()->endOfWeek()->format('d/m/Y')
      ];


      $query = [
        'query' => [
          'dataInicial' => $dates['starts'],
          'dataFinal'   => $dates['ends']
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
        $item->avatar = sprintf("http://www.evolusom.com.br/metatv37/v/%s.png", $item->codUsur);
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

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }


    return view('pages.evos', compact('title', 'next', 'theme', 'data'));
  }

}
