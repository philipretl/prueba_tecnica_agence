@extends('consultor::layouts.admin')
@include('consultor::layouts.menu')
@section('content')
  @include('consultor::layouts.banner')
  <div class="page-inner mt--5">
    <div class="row mt--2">
      <div class="col-md-8">
        @include('flash::message')
        <div class="card">
          @error('consultores')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="card-body">
            @isset($reportes)
              <div class="col">
              <div class="row">
                <div class="col ">
                  <a href="{{route('consultor.dashboard')}}" class="text-white">
                    <button type="button" class="btn btn-outline-success" name="button">
                      regresar
                    </button>
                  </a>
                </div>

                <div class="col">
                  <form class="" action="{{route('consultor.reporte.desempenio')}}" method="post">
                    @csrf
                    @method('POST')
                    <input class="" type="hidden" name="consultores" value="{{$consultores}}">
                    <input class="date" type="hidden" name="fecha_inicial" value="{{$fecha_inicial}}">
                    <input class="date" type="hidden" name="fecha_final" value="{{$fecha_final}}">

                    <button type="submit" class="btn btn-primary btn-border btn-round">
                      <i class="fas fa-chart-bar"> Informe Desempeño</i>
                    </button>

                  </form>
                </div>
                <div class="col">

                  <form class="" action="{{route('consultor.reporte.ganancia')}}" method="post">
                    @csrf
                    @method('POST')
                    <input class="" type="hidden" name="consultores" value="{{$consultores}}">
                    <input class="date" type="hidden" name="fecha_inicial" value="{{$fecha_inicial}}">
                    <input class="date" type="hidden" name="fecha_final" value="{{$fecha_final}}">
                    <button type="submit" class="btn btn-primary btn-border btn-round" name="button">
                      <i class="fas fa-chart-pie"> Informe Ganancias</i>
                    </button>

                  </form>
                </div>

              </div>
            </div>
              <div class="card-action">
                <div class="container">

                </div>

                <br>
                <div class="container">

                </div>

              </div>
              <h5 class="card-title">Ganancias de consultores</h5>
            @else
              <h5 class="card-title">Seleccione los consultores a filtrar</h5>
            @endisset
            @isset($consultores)
              @if (!$consultores->isEmpty())
                <div class="row">
                  @foreach ($consultores as $consultor)
                    <div class="card offset-md">
                      <div class="card-body">
                        <button type="button" class="btn btn-outline-primary">
                          {{$consultor->co_usuario}}
                          @isset($reportes)
                          @else
                            <span class="badge badge-light">
                              <input class="@error('consultores') is-invalid @enderror" type="checkbox" name="consultores[]" value="{{$consultor->co_usuario}}">
                              </span>
                            @endisset

                          </button>

                        </div>

                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Generar Informe de ganancias</h5>
                  <hr>
                  <div class="d-flex justify-content-center">
                    <h4 class="justify-center">Periodo</h4>
                  </div>
                  <div class="row d-flex justify-content-between">
                    <div class="col-md-5 ">
                    <h4 class="justify-center">desde: </h4>
                      <h4>{{$fecha_inicial}}</h4>
                    </div>

                    <div class="col-md-5 ">
                      <h4 class="justify-center">hasta: </h4>
                      <h4>{{$fecha_final}}</h4>
                    </div>
                  </div>
                </div>


              @endif
            @else
              <br>
              <h1>No hay Consultores</h1>
            @endisset
          </div>
        </div>
        @isset($reportes)
          <div class="col-md-12">
            <div class="card">
              @foreach ($consultores as $consultor)
              <div class="card-body">

                <h5 class="card-title">{{$consultor->co_usuario}}</h5>
                <hr>
                @if ($consultor->reportes!=null)
                  @foreach ($consultor->reportes as $reporte)

                    <div class="table-responsive">
                      <table id="add-row" class="display table  table-sm table-striped table-hover table-bordered" >
                        <thead>
                          <tr>
                            <th style="width:20%">Periodo</th>
                            <th style="width:20%">Receita Liquida</th>
                            <th style="width:20%">Custo Fixo</th>
                            <th style="width:20%">Comissao</th>
                            <th style="width:20%">Lucro</th>
                          </tr>
                        </thead>

                        <tbody>

                          <tr>

                            <td>{{$reporte->getPeriodo() }}</td>
                            <td>@money(round($reporte->getGanancia()*100),'BRL') </td>
                            <td>@money($consultor->valorSalario()*100,'BRL')</td>
                            <td>@money(round($reporte->getComision()*100),'BRL')</td>
                            <td>@money(round($reporte->getLucro()*100),'BRL')</td>

                          </tr>

                        </tr>

                        </tbody>
                      </table>
                    </div>
                  @endforeach
                  @if ($consultor->totalSaldos!=null)


                  <div class="table-responsive">
                    <table id="add-row" class="display table  table-sm table-bordered" >
                      <tbody>
                        <tr>
                          <th style="width:20%">Saldo</th>
                          <th style="width:20%">@money(round($consultor->totalSaldos['total_ganancia']*100),'BRL') </th>
                          <th style="width:20%">@money(round($consultor->totalSaldos['total_costo_fijo']*100),'BRL')</th>
                          <th style="width:20%">@money(round($consultor->totalSaldos['total_comision']*100),'BRL')</th>
                          <th style="width:20%">@money(round($consultor->totalSaldos['total_lucro']*100),'BRL')</th>
                        </tr>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  @endif
                @else
                  <div class="container">
                    <h4>Ningun Reporte que mostrar en el periodo seleccionado</h4>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      @endisset
    </div>

@endsection
