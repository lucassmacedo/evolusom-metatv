@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Ranking Vendas')

@section('vendor-style')
  <style>
    #dashboard-analytics table td {
      padding: 0.15rem!important;
    }
  </style>
@endsection
@section('content')
{{--  <div class="content-header row">--}}
      <div class="content-header row" id="navTitle">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
            <a href="{{ route('home') }}"><img
                src="{{ str_contains(url()->full(), 'evus') ? asset('images/logo/evus-02.png') : asset('images/logo/evolusom-white.png') }}"
                height="60"
                alt=""></a>

            <div class="avatar header-title-avatar p-50 mb-0">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>
            <span style="margin-top: -100px!important;"> Dashboard - Ranking de Faturamento do Mês ({{$dates['starts']}} á {{$dates['ends']}} )</span>
          </h2>
          {{--                    <span class="content-header-title float-right mt-1">(<b>Atualização</b>: {{ \Helper::carbonize($data->first()->atualizacao)->diffForHumans() }})</span>--}}

        </div>
      </div>
    </div>
  </div>
  <div class="content-body">

    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="row">
            @foreach($data['vendas'] as $key => $item)

              <div class="col-sm-4">
                <div class="card bg-analytics text-white" style="min-height: 228px;">
                  <div class="card-content">
                    <div class="card-body text-center text-white">
                      <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left"
                           alt="card-img-left">
                      <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right"
                           alt="card-img-right">

                      <div class="avatar avatar-xl shadow mt-0">
                        <div class="avatar-content">
                          <img src="/images/vendedores/{{$item->codUsur}}.png"
                               onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
                               alt="" width="100">
                        </div>
                      </div>
                      <div class="text-center">
                        <h2 class="mb-2 text-white"><b>{{$loop->iteration}} º Lugar</b></h2>
                        <h3 class="mb-2 text-white"><b>{{$item->nome}}</b></h3>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach
          </div>

        </div>

        <div class="col-md-12 col-12">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive col-12">
                    <table class="table table-borderless top10-vendedores">
                      <thead>
                      <tr>
                        <th></th>
                        <th>Nome</th>
                        <th class="text-center">Projeção</th>
                        <th class="text-center">Atendimentos</th>
                        <th class="text-center">Obtido</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($data['porcentagem'] as $key => $item)
                        <tr>
                          <td width="10">
                            @if($loop->index < 3)
                              <span style="font-size: 30px;font-width: bold;">{{$loop->iteration}}</span>
                            @else
                              <span style="font-size: 20px;font-width: bold;">{{$loop->iteration}}</span>
                            @endif
                          </td>

                          {{--                                                    <td {{ $loop->iteration > 3 ? "colspan=2' " : '' }} class="text-left">--}}
                          <td class="text-left">
                            <div>
                              @if($loop->index < 3)

                                <div class="row">
                                  <div class="col-2">
                                    <img src="/images/vendedores/{{$item->codUsur}}.png"
                                         onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
                                         alt="avtar img holder" height="70" width="70">
                                  </div>

                                  <div class="col-10">
                                    <h3 class="mt-1 text-bold-700">
                                      {{ $item->nome }}

                                    </h3>

                                    <div
                                      class="progress progress-xl progress-bar-{{ \App\Helpers\Helper::getClassProgressBar($item->atingido) }}"
                                    >
                                      <div class="progress-bar progress-bar-striped"
                                           role="progressbar"
                                           aria-valuenow="{{$item->atingido}}"
                                           aria-valuemin="0"
                                           aria-valuemax="100" style="width:{{$item->atingido}}%;"></div>
                                    </div>
                                  </div>
                                </div>
                              @else
                                <div class="row">

                                  <div class="col-12">
                                    <h4 class="mt-1 text-bold-700">
                                      {{ $item->nome }}

                                    </h4>

                                    <div
                                      class="progress progress-xl progress-bar-{{ \App\Helpers\Helper::getClassProgressBar($item->atingido) }}"
                                      style="margin-bottom: 15px;">
                                      <div class="progress-bar progress-bar-striped"
                                           role="progressbar"
                                           aria-valuenow="{{$item->atingido}}"
                                           aria-valuemin="0"
                                           aria-valuemax="100" style="width:{{$item->atingido}}%;"></div>
                                    </div>
                                  </div>
                                </div>
                              @endif

                            </div>


                          </td>
                          <td class="text-center">
                                <span
                                  class="btn btn-relief-{{ \App\Helpers\Helper::getClassProgressBar($item->projetado) }} waves-effect waves-light black text-bold-700 "
                                  style="{{ $loop->index > 3 ? "font-size:14px;padding: 0.6rem 1.2rem" : ''  }}">
                                   {{ $item->projetado}}%
                                </span>
                          </td>
                          <td class="text-center">
                                <span
                                  class="btn btn-relief-{{ \App\Helpers\Helper::getClassProgressBar($item->atingido) }} waves-effect waves-light black text-bold-700 "
                                  style="{{ $loop->index > 3 ? "font-size:14px;padding: 0.6rem 1.2rem" : ''  }}">
                                   {{ $item->numCliAtendidos }}/{{ round($item->numCliPrev )}}
                                </span>
                          </td>
                          <td class="text-center">
                            <span
                              class="btn btn-relief-{{ \App\Helpers\Helper::getClassProgressBar($item->atingido) }} waves-effect waves-light black text-bold-700"
                              style="{{ $loop->index > 3 ? "font-size:14px;padding: 0.6rem 1.2rem" : ''  }}">
                              {{ $item->atingido }}%</span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6" class="text-center">
                          </td>
                        </tr>
                      @endforeach
                      {{--                                            <tr>--}}
                      {{--                                                <td colspan="6" class="text-center">--}}
                      {{--                                                    <div class="progress progress-bar-success progress-xl">--}}
                      {{--                                                        <div class="progress-bar progress-bar-striped"--}}
                      {{--                                                             role="progressbar" aria-valuenow="20"--}}
                      {{--                                                             aria-valuemin="20"--}}
                      {{--                                                             aria-valuemax="100" style="width:80%;"></div>--}}
                      {{--                                                    </div>--}}
                      {{--                                                </td>--}}
                      {{--                                            </tr>--}}
                      {{--                                            <tr>--}}
                      {{--                                                <td width="10"><span--}}
                      {{--                                                            style="font-size: 40px;font-width: bold;">2</span></td>--}}
                      {{--                                                <td width="50">--}}
                      {{--                                                    <div class="avatar">--}}
                      {{--                                                        <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"--}}
                      {{--                                                             alt="avtar img holder" height="80" width="80">--}}
                      {{--                                                    </div>--}}
                      {{--                                                </td>--}}
                      {{--                                                <td class="text-left"><h4 class="mb-0">LUCIANO OTAVIO</h4></td>--}}
                      {{--                                                <td class="text-center"><span--}}
                      {{--                                                            class="btn btn-relief-primary waves-effect waves-light black text-bold-700">80/60  </span>--}}
                      {{--                                                </td>--}}
                      {{--                                                <td class="text-center"><span--}}
                      {{--                                                            class="btn btn-relief-primary waves-effect waves-light black text-bold-700">420.4% </span>--}}
                      {{--                                                </td>--}}
                      {{--                                            </tr>--}}
                      {{--                                            <tr>--}}
                      {{--                                                <td colspan="6">--}}
                      {{--                                                    <div class="progress progress-bar-primary progress-xl">--}}
                      {{--                                                        <div class="progress-bar progress-bar-striped"--}}
                      {{--                                                             role="progressbar" aria-valuenow="20"--}}
                      {{--                                                             aria-valuemin="20"--}}
                      {{--                                                             aria-valuemax="100" style="width:60%;"></div>--}}
                      {{--                                                    </div>--}}
                      {{--                                                </td>--}}
                      {{--                                            </tr>--}}
                      {{--                                            <tr>--}}
                      {{--                                                <td width="10"><span--}}
                      {{--                                                            style="font-size: 40px;font-width: bold;">3</span></td>--}}
                      {{--                                                <td width="50">--}}
                      {{--                                                    <div class="avatar">--}}
                      {{--                                                        <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"--}}
                      {{--                                                             alt="avtar img holder" height="80" width="80">--}}
                      {{--                                                    </div>--}}
                      {{--                                                </td>--}}
                      {{--                                                <td class="text-left"><h4 class="mb-0">LUCIANO OTAVIO</h4></td>--}}
                      {{--                                                <td class="text-center"><span--}}
                      {{--                                                            class="btn btn-relief-danger waves-effect waves-light black text-bold-700">80/60  </span>--}}
                      {{--                                                </td>--}}
                      {{--                                                <td class="text-center"><span--}}
                      {{--                                                            class="btn btn-relief-danger waves-effect waves-light black text-bold-700">420.4% </span>--}}
                      {{--                                                </td>--}}
                      {{--                                            </tr>--}}
                      {{--                                            <tr>--}}
                      {{--                                                <td colspan="6">--}}
                      {{--                                                    <div class="progress progress-bar-danger progress-xl">--}}
                      {{--                                                        <div class="progress-bar progress-bar-striped"--}}
                      {{--                                                             role="progressbar" aria-valuenow="20"--}}
                      {{--                                                             aria-valuemin="80"--}}
                      {{--                                                             aria-valuemax="100" style="width:30%;"></div>--}}
                      {{--                                                    </div>--}}
                      {{--                                                </td>--}}
                      {{--                                            </tr>--}}
                      </tbody>
                    </table>
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
@endsection
