@extends('layouts.horizontalDe   tachedLayoutMaster')

@section('title', 'Fixed Layout')

@section('vendor-style')

@endsection
@section('content')
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
            <div class="avatar bg-rgba-success p-50 m-0">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>
            TOP 10 Vendedores do Mês
          </h2>
          <span class="content-header-title float-right mt-1">(Atualização 31/08/2020 20:00hs)</span>

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
                        <th></th>
                        <th>Nome</th>
                        <th></th>
                        <th class="text-center">Atendimentos</th>
                        <th class="text-center">Obtido</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td width="10"><span
                            style="font-size: 40px;font-width: bold;">1</span></td>
                        <td width="50">
                          <div class="avatar">
                            <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"
                                 alt="avtar img holder" height="80" width="80">
                          </div>
                        </td>
                        <td class="text-left"><h4 class="mb-0">LUCIANO OTAVIO</h4></td>
                        <td class="text-center"><span class="btn btn-relief-success waves-effect waves-light black text-bold-700">80/60  </span></td>
                        <td class="text-center"><span class="btn btn-relief-success waves-effect waves-light black text-bold-700">420.4% </span></td>
                      </tr>
                      <tr>
                        <td colspan="6" class="text-center">
                          <div class="progress progress-bar-success progress-xl">
                            <div class="progress-bar progress-bar-striped"
                                 role="progressbar" aria-valuenow="20"
                                 aria-valuemin="20"
                                 aria-valuemax="100" style="width:80%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="10"><span
                            style="font-size: 40px;font-width: bold;">2</span></td>
                        <td width="50">
                          <div class="avatar">
                            <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"
                                 alt="avtar img holder" height="80" width="80">
                          </div>
                        </td>
                        <td class="text-left"><h4 class="mb-0">LUCIANO OTAVIO</h4></td>
                        <td class="text-center"><span class="btn btn-relief-primary waves-effect waves-light black text-bold-700">80/60  </span></td>
                        <td class="text-center"><span class="btn btn-relief-primary waves-effect waves-light black text-bold-700">420.4% </span></td>
                      </tr>
                      <tr>
                        <td colspan="6">
                          <div class="progress progress-bar-primary progress-xl">
                            <div class="progress-bar progress-bar-striped"
                                 role="progressbar" aria-valuenow="20"
                                 aria-valuemin="20"
                                 aria-valuemax="100" style="width:60%;"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td width="10"><span
                            style="font-size: 40px;font-width: bold;">3</span></td>
                        <td width="50">
                          <div class="avatar">
                            <img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}"
                                 alt="avtar img holder" height="80" width="80">
                          </div>
                        </td>
                        <td class="text-left"><h4 class="mb-0">LUCIANO OTAVIO</h4></td>
                        <td class="text-center"><span class="btn btn-relief-danger waves-effect waves-light black text-bold-700">80/60  </span></td>
                        <td class="text-center"><span class="btn btn-relief-danger waves-effect waves-light black text-bold-700">420.4% </span></td>
                      </tr>
                      <tr>
                        <td colspan="6">
                          <div class="progress progress-bar-danger progress-xl">
                            <div class="progress-bar progress-bar-striped"
                                 role="progressbar" aria-valuenow="20"
                                 aria-valuemin="80"
                                 aria-valuemax="100" style="width:30%;"></div>
                          </div>
                        </td>
                      </tr>
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

            <div class="col-sm-12 ">
              <div class="card bg-analytics text-white" style="height: 230px">
                <div class="card-content">
                  <div class="card-body text-center">
                    <img src="{{ asset('images/elements/decore-left.png') }}" class="img-left" alt="card-img-left">
                    <img src="{{ asset('images/elements/decore-right.png') }}" class="img-right" alt="card-img-right">

                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                      <div class="avatar-content">
                        <i class="feather icon-award white font-large-1"></i>
                      </div>
                    </div>
                    <div class="text-center">
                      <h1 class="mb-2 text-white">Parabéns <b>Luciano Otávio</b></h1>
                      <p class="m-auto">Até o momento o melhor vendedor do mês com
                        <strong>420.4%</strong> da meta atingido.</p>
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
