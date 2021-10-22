@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Meta Equipes')

@section('vendor-style')
  <style>
    .office-banner {
      background-color: #e2ddd8;
      font-family: "Arial";
      padding: 0.125em;
      font-size: 4em;
      text-align: center;
      white-space: nowrap;
      transform: rotate(-10deg);
      position: fixed;
      top: 40%;
      left: -5%;
      right: -5%;
      z-index: 100;
      margin-top: 0;
    }

  </style>
@endsection
@section('content')

  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
            <a href="{{ route('home') }}"><img
                src="{{ str_contains(url()->full(), 'evus') ? asset('images/logo/evus-02.png') : asset('images/logo/evolusom-white.png') }}"
                height="60"
                alt=""></a>

            <div class="avatar header-title-avatar p-50">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>
            <i>PARABÉNS! META DE VENDAS E CAPILARIDADE ATINGIDA!</i>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="content-body">

    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row justify-content-md-center">

            <div class="col-sm-6">
              <div class="card bg-analytics text-white" style="min-height: 228px;">
                <div class="card-content">
                  <div class="card-body text-center text-white">
                    <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left"
                         alt="card-img-left">
                    <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right"
                         alt="card-img-right">

                    <div class="avatar">
                      <div>
                        <img src="/images/vendedores/{{$metas_atingidas_mostrar->vendedor}}.png"
                             height="500"
                             width="500"
                             onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
                             alt="">
                      </div>
                    </div>
                    <div class="text-center">
                      <h1 class="mb-2 text-white"><b>PARABÉNS <br>{{$metas_atingidas_mostrar->nome}}</b></h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
  </div>


@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
  <script>
    var colors = ["#ed8f9d", "#f7bb04", "#0066ff", "#33cc33"];

    function frame() {
      confetti({
        particleCount: 4,
        angle: 60,
        spread: 55,
        origin: {x: 0},
        colors: colors,
      });

      confetti({
        particleCount: 4,
        angle: 120,
        spread: 55,
        origin: {x: 1},
        colors: colors,
      });

      if (Date.now() < Date.now() + 15000) {
        requestAnimationFrame(frame);
      }
    }

    @if(!$metas_atingidas_mostrar->passou)
      frame();
    @endif
  </script>
@endsection
