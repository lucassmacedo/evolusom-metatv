<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $next  = route('capilaridade');

        $response = $this->client->get('vendas');
        $data     = collect(json_decode($response->getBody()->getContents()));

        return view('pages.ranking_vendas', compact('next', 'data', 'theme'));
    }

    // Fixed Layout
    public function ranking_capilaridade()
    {
        $next     = route('produtos-mes');
        $theme    = 'evolusom';
        $response = $this->client->get('vendas');
        $data     = collect(json_decode($response->getBody()->getContents()));

        return view('pages.ranking_capilaridade', compact('data', 'next', 'theme'));
    }

    // Fixed Layout
    public function produtos_mes()
    {
        $theme = 'evolusom';

        $title = "TOP 10 Produtos mais vendidos no Mês";
        $next  = route('produtos-dia');
        return view('pages.ranking_produtos', compact('title', 'next', 'theme'));
    }

    // Fixed Layout
    public function produtos_dia()
    {
        $theme = 'evolusom';

        $title = "TOP 10 Produtos mais vendidos no Dia";
        $next  = route('meta_equipes');
        return view('pages.ranking_produtos', compact('title', 'next', 'theme'));
    }

    // Fixed Layout
    public function meta_equipes()
    {
        $title = "Meta Equipes";
        $next  = route('home');
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
        $title = "Meta Equipes";
        $next  = '';
        return view('pages.evos', compact('title', 'next'));
    }

}
