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
                <a href="{{route('consultor.dashboard')}}" class="text-white">
                  <button type="button" class="btn btn-outline-success" name="button">
                    regresar
                  </button>
                </a>
              <h5 class="card-title">Ganancias de consultores</h5>
            @else
              <h5 class="card-title">Seleccione los consultores a filtrar</h5>
            @endisset

            <form class="" action="{{route('consultor.informe')}}" method="POST">

              @method('POST')
              @csrf
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
                        <h4 class="justify-center">desde:</h4>
                        <label name="labelMonthFrom" for="monthSelect">Mes</label>
                        <select value="{{ old('month_from') }}"  name="month_from" class="form-control @error('month_from') is-invalid @enderror" id="month_from">
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
                      @error('month_from')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <br>
                      <label name="labelMonthFrom" for="yearSelect">Año</label>
                      <select value="{{ old('year_from') }}" name="year_from" class="form-control" id="year_from">
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                      </select>
                      </div>

                      <div class="col-md-5 ">
                        <h4 class="justify-center">hasta: </h4>
                        <label name="labelMonthTo" for="monthSelect">Mes</label>
                        <select value="{{ old('month_to') }}" name="month_to" class="form-control @error('month_to') is-invalid @enderror" id="monthTo">
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
                      <select value="{{old('year_to')}}" name="year_to" class="form-control @error('yeat_to') is-invalid @enderror" id="year_to">
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                      </select>

                      </div>
                    </div>
                  </div>

                  <div class="card-action">
                    <div class="row">
                      <button class="btn btn-primary btn-border btn-round">Relatório</button>
                    </div>
                  </div>
                  <div class="Container">
                    @error('month_to')
                          <div class="alert alert-danger">{{ $message }}</div>

                    @enderror
                    @error('year_to')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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

@endsection
