@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Ranking Capilaridade')

@section('vendor-style')

@endsection
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">
                        <div class="avatar header-title-avatar p-50">
                            <div class="avatar-content">
                                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
                            </div>
                        </div>
                        Dashboard - Acompanhamento Capilaridade
                    </h2>
{{--                    <span class="content-header-title float-right mt-1">(Atualização 31/08/2020 20:00hs)</span>--}}

                </div>
            </div>
        </div>

    </div>
    <div class="content-body">

        <!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive col-12">
                                        <table class="table table-borderless top10-vendedores">
                                            <thead>
                                            <tr>
                                                <td></td>
                                                <td>Nome</td>
                                                <td class="text-center">Atendimentos</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $key => $item)
                                                <tr>
                                                    <td width="10">
                                                        @if($loop->index < 3)
                                                            <span style="font-size: 30px;font-width: bold;">{{$loop->iteration}}</span>
                                                        @else
                                                            <span style="font-size: 20px;font-width: bold;">{{$loop->iteration}}</span>
                                                        @endif
                                                    </td>
                                                   <td class="text-left">
                                                        @if($loop->index < 3)
                                                            <h3 class="mb-0 text-bold-700">{{ $item->nome }}</h3>
                                                        @else
                                                            <h5 class="mb-0">{{ $item->nome }}</h5>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="btn btn-relief-success waves-effect waves-light black text-bold-700 "
                                                              style="{{ $loop->index > 3 ? "font-size:14px;padding: 0.6rem 1.2rem" : ''  }}">
                                                           {{ $item->nclientes }} / {{ $item->nclientesm }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        <div class="progress progress-bar-success progress-xl"
                                                             style="margin-bottom: 15px;">
                                                            <div class="progress-bar progress-bar-striped"
                                                                 role="progressbar" aria-valuenow="20"
                                                                 aria-valuemin="20"
                                                                 aria-valuemax="100" style="width:80%;"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="row">

                      <div class="row">

                        <div class="col-sm-12 ">
                          <div class="card bg-analytics text-white" style="height: 230px">
                            <div class="card-content">
                              <div class="card-body text-center text-white">
                                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left"
                                     alt="card-img-left">
                                <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right"
                                     alt="card-img-right">

                                <div class="avatar bg-success bg-transparent  avatar-xl shadow mt-0">
                                  <div class="avatar-content">
                                    <span class="fa fa-circle-o fa-stack-2x"></span>
                                    <!-- a strong element with the custom content, in this case a number -->
                                    <strong class="fa-stack-1x">
                                      1
                                    </strong>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <h1 class="mb-2 text-white"><b>Luciano Otávio</b></h1>
                                  <p class="m-auto">Até o momento o melhor vendedor do mês com
                                    <strong>420.4%</strong> da meta atingido.</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 ">
                          <div class="card bg-analytics text-white" >
                            <div class="card-content">
                              <div class="card-body text-center text-white">
                                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left"
                                     alt="card-img-left">
                                <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right"
                                     alt="card-img-right">

                                <div class="avatar bg-success bg-transparent  avatar-xl shadow mt-0">
                                  <div class="avatar-content">
                                    <span class="fa fa-circle-o fa-stack-2x"></span>
                                    <!-- a strong element with the custom content, in this case a number -->
                                    <strong class="fa-stack-1x">
                                      2
                                    </strong>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <h1 class="mb-2 text-white"><b>Luciano Otávio</b></h1>
                                  {{--                      <p class="m-auto">Até o momento o melhor vendedor do mês com--}}
                                  {{--                        <strong>420.4%</strong> da meta atingido.</p>--}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12 ">
                          <div class="card bg-analytics text-white" >
                            <div class="card-content">
                              <div class="card-body text-center text-white">
                                <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left"
                                     alt="card-img-left">
                                <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right"
                                     alt="card-img-right">

                                <div class="avatar bg-success bg-transparent  avatar-xl shadow mt-0">
                                  <div class="avatar-content">
                                    <span class="fa fa-circle-o fa-stack-2x"></span>
                                    <!-- a strong element with the custom content, in this case a number -->
                                    <strong class="fa-stack-1x">
                                      3
                                    </strong>
                                  </div>
                                </div>
                                <div class="text-center">
                                  <h1 class="mb-2 text-white"><b>Luciano Otávio</b></h1>
                                  {{--                      <p class="m-auto">Até o momento o melhor vendedor do mês com--}}
                                  {{--                        <strong>420.4%</strong> da meta atingido.</p>--}}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Gráfico de Participação</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <canvas id="pie-chart" height="300"></canvas>

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
