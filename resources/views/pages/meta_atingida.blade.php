@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Meta Equipes')

@section('vendor-style')
  <style>
    .evolusom-theme {
      background: #cf252b;
      background-image: url(/images/backgrounds/meta_cumprida.png) !important;
      background-position: top !important;
      background-repeat: no-repeat;
      background-size: cover !important;
      color: #fff;
    }
  </style>
@endsection
@section('content')

  <div class="content-header row">
    <div class="col-8 offset-2" style="margin-top: 300px">
      @foreach($vendedores as $vendedor)
        <div class="avatar">
          <img src="/images/vendedores/{{$vendedor->vendedor}}.png"
               onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
               alt="avtar img holder" height="150" width="150">
        </div>
      @endforeach
    </div>
  </div>

@endsection
@section('vendor-script')

@endsection
