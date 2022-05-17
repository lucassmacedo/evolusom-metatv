@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Meta Equipes')

@section('vendor-style')
  <style>
    .evolusom-theme {
      background: #cf252b;
      background-image: url(/images/iberostar/Meta-TV.png) !important;
      background-position: top !important;
      background-repeat: no-repeat;
      background-size: cover !important;
      color: #fff;
    }
  </style>
@endsection
@section('content')

  <div class="content-header row" style="margin-top: 160px">
    <div class="col-5 offset-2">
      <div class="row">
        <div class="col-10 mb-2">

        <h1>Ranking Faturamento</h1>
        </div>
      </div>
      @foreach($data['faturamento'] as $vendedor)
        <div class="row" style="margin-bottom: 4px;">
          {{--          <div class="col-2">--}}
          {{--            <img src="/images/vendedores/{{$vendedor->codigo}}.png"--}}
          {{--                 onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"--}}
          {{--                 alt="avtar img holder" height="50" width="50">--}}
          {{--          </div>--}}

          <div class="col-10">
            <h3 class="text-bold-700">
              {{ $loop->index + 1}} - {{$vendedor->nome}}
            </h3>

          </div>
        </div>
      @endforeach
    </div>

    <div class="col-5">
      <div class="row">
        <div class="col-10 mb-2">
          <h1>Ranking Capilaridade</h1>
        </div>
      </div>

      @foreach($data['capilaridade'] as $vendedor)
        <div class="row" style="margin-bottom: 4px;">
          {{--          <div class="col-2">--}}
          {{--            <img src="/images/vendedores/{{$vendedor->codigo}}.png"--}}
          {{--                 onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"--}}
          {{--                 alt="avtar img holder" height="50" width="50">--}}
          {{--          </div>--}}
          <div class="col-10">
            <h3 class="text-bold-700">
              {{ $loop->index + 1}} - {{$vendedor->nome}}
            </h3>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
@section('vendor-script')

@endsection
