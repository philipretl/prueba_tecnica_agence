@extends('consultor::layouts.admin')
@include('consultor::layouts.menu')
@section('content')
  @include('consultor::layouts.banner')
  <div class="page-inner mt--5">
    <div class="row mt--2">
      <div class="col-md-8">
        @include('flash::message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Seleccione los consultores a filtrar</h5>
            <form class="" action="{{route('consultor.informe')}}" method="POST">
              @method('POST')
              @csrf
              @isset($data)
                @if (!$data['consultoresActivos']->isEmpty())
                  <div class="row">
                    @foreach ($data['consultoresActivos'] as $consultor)
                      <div class="card offset-md">
                        <div class="card-body">
                          <button type="button" class="btn btn-outline-primary">
                            {{$consultor->co_usuario}} <span class="badge badge-light">
                              <input type="checkbox" name="consultores[]" value="{{$consultor->co_usuario}}">
                            </span>
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
                        <h4 class="justify-center">desde</h4>
                        <label name="labelMonthFrom" for="monthSelect">Mes</label>
                        <select name="monthFrom" class="form-control" id="monthFrom">
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                      <br>
                      <label name="labelMonthFrom" for="yearSelect">Año</label>
                      <select name="yearFrom" class="form-control" id="yearFrom">
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2018">2019</option>
                      </select>
                      </div>

                      <div class="col-md-5 ">
                        <h4 class="justify-center">hasta</h4>
                        <label name="labelMonthTo" for="monthSelect">Mes</label>
                        <select name="monthTo" class="form-control" id="monthTo">
                          <option value="1">January</option>
                          <option value="2">February</option>
                          <option value="3">March</option>
                          <option value="4">April</option>
                          <option value="5">May</option>
                          <option value="6">June</option>
                          <option value="7">July</option>
                          <option value="8">August</option>
                          <option value="9">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                      <br>
                      <label for="yearSelect">Año</label>
                      <select name="yearTo" class="form-control" id="yearTo">
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2018">2019</option>
                      </select>
                      </div>
                    </div>
                  </div>

                  <div class="card-action">
                    <div class="row">
                      <button class="btn btn-primary btn-border btn-round">Relatório</button>
                    </div>
                  </div>
                @endif
              @else
                <br>
                <h1>No hay Consultores</h1>
              @endisset

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
