@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', 'Ranking EVUS')

@section('vendor-style')

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

            <div class="avatar header-title-avatar p-50 mb-0">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>

            Dashboard - Meta Evus ({{$dates['starts']}} á {{$dates['ends']}} )
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
          <div class="card text-center bg-evus" style="min-height: 296px">
            <div class="card-content">
              <div class="card-body">
                <h2 class="text-bold-700 text-white text-italic" style="border-bottom: 2px solid #ffffff69;">
                  1 LUGAR CAPILARIDADE</h2>

                @if(!empty($data['capilaridade']))
                  <div class="row">
                    <div class="col-12">
                      <div class="avatar">

                        <img src="{{$data['capilaridade']->first()->avatar}}"
                             alt=""
                             onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"

                             width="120"
                             height="120">

                      </div>

                    </div>
                    <div class="col-12">
                      <h3 class="text-bold-700 text-white">{{($data['capilaridade']->first()->nome)}}</h3>
                      <h2><span
                          class="mb-0 text-white font-medium-3 text-bold-700">Total Geral : {{ $data['geral']->sum('numCliAtendidos') }}</span>
                      </h2>
                    </div>
                  </div>
                @endif

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70"
                     style="position: relative;margin-bottom: -50px">
                {{--                <div class="font-large-2 text-white pull-right">--}}
                {{--                    <i class="fa fa-share-alt"></i>--}}
                {{--                </div>--}}'
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6">
          <div class="card text-center bg-evus" style="min-height: 296px">
            <div class="card-content">
              <div class="card-body">

                <h2 class="text-bold-700 text-white text-italic" style="border-bottom: 2px solid #ffffff69;">
                  1º LUGAR FATURAMENTO</h2>
                @if(!empty($data['faturamento']))
                  <div class="row">
                    <div class="col-12">
                      <div class="avatar">
                        <img src="{{$data['faturamento']->first()->avatar}}"
                             alt=""

                             onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
                             width="120"
                             height="120">


                      </div>
                    </div>
                    <div class="col-12">
                      <h3 class="text-bold-700 text-white">{{($data['faturamento']->first()->nome)}}</h3>
                      <h2><span
                          class="mb-0 text-white font-medium-3 text-bold-700">Total Geral : {{ number_format($data['geral']->sum('faturamentoEvus'),2,",",".")  }}</span>
                      </h2>
                    </div>
                  </div>
                @endif

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70"
                     style="position: relative;margin-bottom: -50px">
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

                <h2 class="text-bold-700 text-white text-italic " style="border-bottom: 2px solid #ffffff69;">1º LUGAR
                  PONTUAÇÃO</h2>
                @if(!empty($data['pontuacao']))
                  <div class="row">
                    <div class="col-12">
                      <div class="avatar">
                        <img src="{{$data['pontuacao']->first()->avatar}}"
                             alt=""
                             onerror="this.src='{{asset('images/elements/icon-avatar-default.png')}}'"
                             width="120"
                             height="120">
                      </div>
                    </div>
                    <div class="col-12">
                      <h3 class="text-bold-700 text-white">{{($data['pontuacao']->first()->nome)}}</h3>

                      <h4 class="text-bold-700 text-white">{{($data['pontuacao']->first()->pontuacao)}} Pontos</h4>
                    </div>
                  </div>
                @endif

                <img src="{{ asset('images/icons/lider.png') }}" alt="" width="70"
                     style="position: relative;margin-bottom: -50px">
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
                @if(!empty($data['capilaridade']))
                  @foreach($data['capilaridade'] as $item)
                    @if($loop->iteration > 1)
                      <tr>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-4 text-bold"><b>{{$loop->iteration}}º</b></span>
                        </td>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-3 text-bold-700">{{ $item->nome }}</span>
                        </td>
                      </tr>
                    @endif

                  @endforeach
                  <tr>
                    <td class="text-left" height="40">
                      <span class="mb-0 font-medium-4 text-bold"><b>Total:</b></span>
                    </td>
                    <td class="text-left" height="40">
                      <span class="mb-0 font-medium-3 text-bold-700">{{ $data['geral']->sum('numCliAtendidos') }}</span>
                    </td>
                  </tr>
                @endif
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
                @if(!empty($data['pontuacao']))
                  @foreach($data['faturamento'] as $item)
                    @if($loop->iteration > 1)
                      <tr>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-4 text-bold"><b>{{$loop->iteration}}º</b></span>
                        </td>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-3 text-bold-700"> {{ $item->nome }}</span>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                  <tr>
                    <td class="text-left" height="40">
                      <span class="mb-0 font-medium-4 text-bold"><b>Total:</b></span>
                    </td>
                    <td class="text-left" height="40">
                      <span
                        class="mb-0 font-medium-3 text-bold-700">{{ number_format($data['geral']->sum('faturamentoEvus'),2,",",".")  }}</span>
                    </td>
                  </tr>
                @endif
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
                @if(!empty($data['pontuacao']))
                  @foreach($data['pontuacao'] as $item)
                    @if($loop->iteration > 1)
                      <tr>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-4 text-bold"><b>{{$loop->iteration}}º</b></span>
                        </td>
                        <td class="text-left" height="40">
                          <span class="mb-0 font-medium-3 text-bold-700"> {{ $item->nome }}</span>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                @endif
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
