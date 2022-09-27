@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Campanha Evoluir')

@section('vendor-style')
  <style>
    .evolusom-theme {
      background: transparent !important;
      background-image: url(/images/backgrounds/evoluir.png) !important;
      background-position: center center;
      background-repeat: no-repeat;
      background-size: contain;
      color: #fff;
    }

    .content-header-title {
      font-weight: bold !important;
    }
  </style>
@endsection
@section('content')
  <div class="content-body">
    <section id="statistics-card" class="meta-equipes" style="margin-top: 250px">
      <div class="row">

        <div class="col-lg-3 col-sm-12 col-12">
          <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h2 class="content-header-title float-left mb-0 width-95-per">
                    <i>EQUIPE</i>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header d-flex align-items-start pb-0">
              <table class="table table-borderless">
                <tbody>
                @foreach($data['items'] as $item)
                  <tr>
                    <td class="text-left" height="55">
                      <h4 class="mb-0"> {{ $item->nome }}</h4>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-6 col-sm-12 col-12">
              <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                    <div class="col-12">
                      <h2
                        class="content-header-title mb-0 width-95-per d-flex justify-content-between d-flex align-items-end">
                        <i>FAT. vs HIST.:</i>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                  <table class="table table-borderless">
                    <tbody>
                    @foreach($data['items'] as $item)
                      <tr>
                        <td class="text-center" height="55">
                          <div class="row">
                            <div class="col">
                              <div
                                class="progress progress-xl progress-bar-{{ \App\Helpers\Helper::getClassProgressBar($item->atingido_meta) }}"
                              >
                                <div class="progress-bar progress-bar-striped"
                                     role="progressbar"
                                     aria-valuenow="{{$item->atingido_meta}}"
                                     aria-valuemin="0"
                                     aria-valuemax="100" style="width:{{$item->atingido_meta}}%;"></div>
                              </div>
                            </div>

                            <div class="col-3 text-bold-700 font-medium-3 no-wrap text-right">
                              {{ $item->atingido_meta2  }}%
                            </div>
                          </div>
                        </td>

                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-12">
              <div class="content-header row title-space">
                <div class="content-header-left col-md-12 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                    <div class="col-12">
                      <h2
                        class="content-header-title mb-0 width-95-per d-flex justify-content-between d-flex align-items-end">
                        <i style="text-align: left">
                          <br>
                          CAP.VS HIST.:</i>
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                  <table class="table table-borderless">
                    <tbody>
                    @foreach($data['items'] as $item)
                      <tr>

                        <td class="text-center" height="55">
                          <div class="row">
                            <div class="col-3 text-bold-700 font-medium-3 no-wrap">
                              {{$item->numCliAtendidos}} / {{round($item->hist_cap)}}
                            </div>
                            <div class="col">
                              <div
                                class="progress progress-xl progress-bar-{{ \App\Helpers\Helper::getClassProgressBar($item->per_clientes2) }}"
                              >
                                <div class="progress-bar progress-bar-striped"
                                     role="progressbar"
                                     aria-valuenow="{{$item->per_clientes2}}"
                                     aria-valuemin="0"
                                     aria-valuemax="100" style="width:{{$item->per_clientes2}}%;"></div>
                              </div>
                            </div>

                            <div class="col-3 text-bold-700 font-medium-3 no-wrap">
                              {{$item->per_clientes2}}%
                            </div>
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


    {{--        </section>       <section id="statistics-card">--}}

    {{--            <div class="row">--}}
    {{--                <div class="col-xl-3 col-md-4 col-sm-6">--}}
    {{--                    <div class="card text-center">--}}
    {{--                        <div class="card-content">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">--}}
    {{--                                    <div class="avatar-content">--}}
    {{--                                        <i class="feather icon-target text-info font-medium-5"></i>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <h2 class="text-bold-700">36.9k</h2>--}}
    {{--                                <p class="mb-0 line-ellipsis  text-bold-700">META GERAL MÊS</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xl-3 col-md-4 col-sm-6">--}}
    {{--                    <div class="card text-center">--}}
    {{--                        <div class="card-content">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="avatar bg-rgba-warning p-50 m-0 mb-1">--}}
    {{--                                    <div class="avatar-content">--}}
    {{--                                        <i class="feather icon-check-circle text-warning font-medium-5"></i>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <h2 class="text-bold-700">12k</h2>--}}
    {{--                                <p class="mb-0 line-ellipsis  text-bold-700">META GERAL REALIZADA</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xl-3 col-md-4 col-sm-6">--}}
    {{--                    <div class="card text-center">--}}
    {{--                        <div class="card-content">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="avatar bg-rgba-danger p-50 m-0 mb-1">--}}
    {{--                                    <div class="avatar-content">--}}
    {{--                                        <i class="feather icon-shopping-bag text-danger font-medium-5"></i>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <h2 class="text-bold-700">97.8k</h2>--}}
    {{--                                <p class="mb-0 line-ellipsis text-bold-700">ATENDIDOS GERAL </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xl-3 col-md-4 col-sm-6">--}}
    {{--                    <div class="card text-center">--}}
    {{--                        <div class="card-content">--}}
    {{--                            <div class="card-body">--}}
    {{--                                <div class="avatar bg-rgba-success p-50 m-0 mb-1">--}}
    {{--                                    <div class="avatar-content">--}}
    {{--                                        <i class="feather icon-user-check text-success font-medium-5"></i>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <h2 class="text-bold-700">26.8</h2>--}}
    {{--                                <p class="mb-0 line-ellipsis  text-bold-700">CAPILARIDADE GERAL </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-lg-12 col-sm-12 col-12">--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-header d-flex align-items-start pb-0">--}}
    {{--                            <table class="table table-borderless top10-vendedores table-bordered">--}}
    {{--                                <thead>--}}
    {{--                                <tr>--}}
    {{--                                    <th colspan="2">Equipe</th>--}}
    {{--                                    <th class="text-center"><b>Clientes: </b> Meta x Atendidos</th>--}}
    {{--                                    <th class="text-center">Faturamento</th>--}}
    {{--                                </tr>--}}
    {{--                                </thead>--}}
    {{--                                <tbody>--}}
    {{--                                <tr>--}}
    {{--                                    <td class="text-left" colspan="2">--}}
    {{--                                        <h4 class="mb-0">LUCIANO OTAVIO</h4></td>--}}
    {{--                                    <td class="text-center" width="30%">--}}
    {{--                                        <div class="browser-info">--}}
    {{--                                            --}}{{--                      <p class="mb-25">Internet Explorer</p>--}}
    {{--                                            <h4>80/60</h4>--}}
    {{--                                        </div>--}}

    {{--                                        <div class="row">--}}
    {{--                                            <div class="col-2 text-bold-700 font-medium-3 ">7%</div>--}}
    {{--                                            <div class="col">--}}
    {{--                                                <div class="progress progress-bar-success progress-xl">--}}
    {{--                                                    <div class="progress-bar progress-bar-striped"--}}
    {{--                                                         role="progressbar" aria-valuenow="20"--}}
    {{--                                                         aria-valuemin="20"--}}
    {{--                                                         aria-valuemax="100"--}}
    {{--                                                         style="width:80%;color:black;font-weight: bold;font-size: large"></div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </td>--}}
    {{--                                    <td class="text-center" width="30%">--}}
    {{--                                        <div class="browser-info">--}}
    {{--                                            --}}{{--                      <p class="mb-25">Internet Explorer</p>--}}
    {{--                                            <h4>80/60</h4>--}}
    {{--                                        </div>--}}

    {{--                                        <div class="progress progress-bar-success progress-xl">--}}
    {{--                                            <div class="progress-bar progress-bar-striped"--}}
    {{--                                                 role="progressbar" aria-valuenow="20"--}}
    {{--                                                 aria-valuemin="20"--}}
    {{--                                                 aria-valuemax="100" style="width:80%;"></div>--}}
    {{--                                        </div>--}}
    {{--                                    </td>--}}
    {{--                                </tr>--}}
    {{--                                <tr>--}}
    {{--                                    <td class="text-left" colspan="2">--}}
    {{--                                        <h4 class="mb-0">LUCIANO OTAVIO</h4></td>--}}
    {{--                                    <td class="text-center" width="30%">--}}
    {{--                                        <div class="browser-info">--}}
    {{--                                            --}}{{--                      <p class="mb-25">Internet Explorer</p>--}}
    {{--                                            <h4>80/60</h4>--}}
    {{--                                        </div>--}}

    {{--                                        <div class="row">--}}
    {{--                                            <div class="col-2 text-bold-700 font-medium-3 ">7%</div>--}}
    {{--                                            <div class="col">--}}
    {{--                                                <div class="progress progress-bar-success progress-xl">--}}
    {{--                                                    <div class="progress-bar progress-bar-striped"--}}
    {{--                                                         role="progressbar" aria-valuenow="20"--}}
    {{--                                                         aria-valuemin="20"--}}
    {{--                                                         aria-valuemax="100"--}}
    {{--                                                         style="width:80%;color:black;font-weight: bold;font-size: large"></div>--}}
    {{--                                                </div>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </td>--}}
    {{--                                    <td class="text-center" width="30%">--}}
    {{--                                        <div class="browser-info">--}}
    {{--                                            --}}{{--                      <p class="mb-25">Internet Explorer</p>--}}
    {{--                                            <h4>80/60</h4>--}}
    {{--                                        </div>--}}

    {{--                                        <div class="progress progress-bar-success progress-xl">--}}
    {{--                                            <div class="progress-bar progress-bar-striped"--}}
    {{--                                                 role="progressbar" aria-valuenow="20"--}}
    {{--                                                 aria-valuemin="20"--}}
    {{--                                                 aria-valuemax="100" style="width:80%;"></div>--}}
    {{--                                        </div>--}}
    {{--                                    </td>--}}
    {{--                                </tr>--}}

    {{--                                </tbody>--}}
    {{--                            </table>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}


    {{--        </section>--}}

  </div>

@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
