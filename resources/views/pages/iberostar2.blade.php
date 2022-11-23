@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Meta Equipes')

@section('vendor-style')
  <style>
    .evolusom-theme {
      background: #cf252b;
      background-image: url(/images/iberostar/bg3.png) !important;
      background-position: top !important;
      background-repeat: no-repeat;
      background-size: cover !important;
      color: #fff;
    }

    .sticky {
      position: relative !important;
      background: none !important;
      padding-top: 0 !important;
      width: auto !important;
    }

    .progress.progress-xl {
      height: 2.4rem !important;
      font-weight: bold;
      font-size: 20px;
    }

    .progress.progress-xl div {
      color: #000;
    }

  </style>
@endsection
@section('content')

  {{--  <div class="content-header row" id="" style="margin-top:260px;">--}}
  <div class="content-header row" id="navTitle" style="margin-top:32rem;margin-bottom: 10rem;">
    <div class="col-10 offset-2" style="min-height: 1020px;">
      <div class="row">
        <div class="col-10">
          <div class="progress progress-xl progress-bar-{{ \App\Helpers\Helper::getClassProgressBar($atingido) }}">
            <div class="progress-bar progress-bar-striped"
                 role="progressbar"
                 aria-valuenow="{{$atingido}}"
                 aria-valuemin="0"
                 aria-valuemax="100" style="width:{{$atingido}}%;">{{round($atingido,2)}}%
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <h3 class="text-bold-700 mt-2"> Vendedor </h3>
        </div>
        <div class="col-3">
          <h3 class="text-bold-700 mt-2"> Total Vendido </h3>
        </div>
        <div class="col-3">
          <h3 class="text-bold-700 mt-2"> Clientes </h3>
        </div>
      </div>
      @foreach($data as $vendedor)
        <div class="row">
          <div class="col-1">
            <div class="avatar avatar-xl shadow mt-0">
              <div class="avatar-content">
                <img src="{{ Helper::getFotoPortal($vendedor['cpf']) }}"
                     onerror="this.src='http://metatv.test/images/elements/icon-avatar-default.png'" alt="" width="50">
              </div>
            </div>
          </div>

          <div class="col-5">
            <h3 class="text-bold-700 mt-2">
              {{ $loop->index + 1}} - {{$vendedor['nome']}}
            </h3>
          </div>

          <div class="col-3">
            <h3 class="text-bold-700 mt-2">
              R$: {{ number_format($vendedor['vlvenda'], 2,',','.') }}
            </h3>
          </div>
          <div class="col-2 text-left">
            <h3 class="text-bold-700 mt-2">
              {{ $vendedor['qtclipos'] }}
            </h3>
          </div>

        </div>
      @endforeach
    </div>
  </div>

@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
