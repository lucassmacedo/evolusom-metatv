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

    if (env('APP_ENV') <> 'local') {
      abort(404);
    }

    $theme = 'evolusom';
    $next = route('capilaridade');
    $next = null;

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
      })->where('vlMeta', '<>', 0)
        ->take(50)
        ->sortByDesc('atingido')
        ->sortByDesc('projetado');


      $data['vendas'] = $response_month->map(function ($item) {
        $item->atingido = $item->vlVenda > 0 && $item->vlMeta > 0 ? round(($item->vlVenda / $item->vlMeta) * 100, 2) : 0;
        return $item;
      })->sortByDesc('vlVenda')
        ->take(3);

      $label = array_column($data['vendas']->toArray(), 'nome');
      $values = array_column($data['vendas']->toArray(), 'vlVenda');
      $pieChart = [
        'labels'   => $label,
        'datasets' => [
          [
            'data' => $values,

            'backgroundColor' => [
              '#7367F0',
              '#28C76F',
              '#FF9F43',
            ]
          ]
        ],
      ];


    } catch (Exception $exception) {
      dd($exception->getMessage());
    }

    return view('pages.ranking_vendas', compact('next', 'data', 'theme', 'pieChart', 'dates'));
  }

  // Fixed Layout
  public function ranking_capilaridade()
  {
    if (env('APP_ENV') <> 'local') {
      abort(404);
    }
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
      })
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

    $response = $this->client->get('equipes');

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

      $response = $this->client->get('metatvevus', $query);
      $response = collect(json_decode($response->getBody()->getContents()))->map(function ($item) {
        $item->avatar = sprintf("http://www.evolusom.com.br/metatv37/v/%s.png", $item->codUsur);
        return $item;
      });


      $data['capilaridade'] = $response->sortByDesc('numCliAtendidos')->whereNotIn('codUsur', [1])->take(10);

      $data['faturamento'] = $response->sortByDesc('faturamentoEvus')->whereNotIn('codUsur', [1])->take(10);

      $data['pontuacao'] = $response->sortByDesc('pontuacao')->whereNotIn('codUsur', [1])->take(10);

    } catch (Exception $exception) {
      dd($exception->getMessage());
    }


    return view('pages.evos', compact('title', 'next', 'theme', 'data'));
  }

}
