<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaterkitController extends Controller
{


    // Fixed Layout
    public function ranking_vendas()
    {
        $next = route('capilaridade');

        $response = Http::get('http://test.com');




        return view('pages.ranking_vendas', compact('next'));
    }

    // Fixed Layout
    public function ranking_capilaridade()
    {
        $next = route('produtos-mes');

        return view('pages.ranking_capilaridade', compact('next'));
    }

    // Fixed Layout
    public function produtos_mes()
    {
        $title = "TOP 10 Produtos mais vendidos no Mês";
        $next  = route('produtos-dia');
        return view('pages.ranking_produtos', compact('title', 'next'));
    }

    // Fixed Layout
    public function produtos_dia()
    {
        $title = "TOP 10 Produtos mais vendidos no Dia";
        $next  = route('meta_equipes');
        return view('pages.ranking_produtos', compact('title', 'next'));
    }

    // Fixed Layout
    public function meta_equipes()
    {
        $title = "Meta Equipes";
        $next  = route('home');
        return view('pages.meta_equipes', compact('title', 'next'));
    }

    // Fixed Layout
    public function evos()
    {
        $title = "Meta Equipes";
        $next = '';
        return view('pages.evos', compact('title', 'next'));
    }

}
