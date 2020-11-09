@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Ranking EVOS')

@section('vendor-style')

@endsection
@section('content')
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
            <div class="avatar header-title-avatar p-50 mb-1">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>
            Dashboard - Meta Evus
          </h2>
          {{--          <span class="content-header-title float-right mt-1">(Atualização 31/08/2020 20:00hs)</span>--}}

        </div>

      </div>
    </div>

  </div>
  <div class="content-body">
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
      <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="card text-center bg-evus">
            <div class="card-content">
              <div class="card-body">
                <h2 class="text-bold-700 text-white text-italic" style="border-bottom: 2px solid #ffffff69;">CAPILARIDADE</h2>

                <h2 class="text-bold-700 text-white">44.34%</h2>
                <h2 class="text-bold-700 text-white">WILLIAN BADDINI</h2>

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70" style="position: relative;margin-bottom: -50px">
{{--                <div class="font-large-2 text-white pull-right">--}}
{{--                    <i class="fa fa-share-alt"></i>--}}
{{--                </div>--}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="card text-center bg-evus">
            <div class="card-content">
              <div class="card-body">

                <h2 class="text-bold-700 text-white text-italic" style="border-bottom: 2px solid #ffffff69;">FATURAMENTO</h2>
                <h2 class="text-bold-700 text-white">R$ 14.727,36</h2>
                <h2 class="text-bold-700 text-white">CASSIO TREVISAN</h2>

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70" style="position: relative;margin-bottom: -50px">
{{--                <div class="font-large-2 text-white pull-right">--}}
{{--                    <i class="fa fa-share-alt"></i>--}}
{{--                </div>--}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="card text-center bg-evus">
            <div class="card-content">
              <div class="card-body">

                <h2 class="text-bold-700 text-white text-italic " style="border-bottom: 2px solid #ffffff69;">MAIOR PONTUAÇÃO</h2>
                <h2 class="text-bold-700 text-white">420</h2>
                <h2 class="text-bold-700 text-white">WILLIAN BADDINI</h2>

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70" style="position: relative;margin-bottom: -50px">
{{--                <div class="font-large-2 text-white pull-right">--}}
{{--                    <i class="fa fa-share-alt"></i>--}}
{{--                </div>--}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="content-header row">
            <div class="content-header-left col-md-12 col-12">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h2 class="content-header-title float-left mb-0 width-95-per">
                    <i>CAPILARIDADE</i>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent shadow-none ml-2">
            <div class="card-header d-flex align-items-start p-0">
              <table class="table table-borderless text-white">
                <tbody>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>2º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-5 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>3º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>4º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>5º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>6º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="content-header row">
            <div class="content-header-left col-md-12 col-12">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h2 class="content-header-title float-left mb-0 width-95-per">
                    <i>FATURAMENTO</i>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent shadow-none ml-2">
            <div class="card-header d-flex align-items-start p-0">
              <table class="table table-borderless text-white">
                <tbody>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>2º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-5 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>3º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>4º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>5º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>6º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="content-header row">
            <div class="content-header-left col-md-12 col-12">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h2 class="content-header-title float-left mb-0 width-95-per">
                    <i>PONTUAÇÃO</i>
                  </h2>
                </div>
              </div>
            </div>
          </div>
          <div class="card bg-transparent shadow-none ml-2">
            <div class="card-header d-flex align-items-start p-0">
              <table class="table table-borderless text-white">
                <tbody>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>2º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-5 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>3º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>4º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>5º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                <tr>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold"><b>6º</b></span>
                  </td>
                  <td class="text-left" height="40">
                    <span class="mb-0 font-medium-4 text-bold">49 WILIAM BADDINI</span>
                  </td>
                </tr>
                </tbody>
              </table>
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
