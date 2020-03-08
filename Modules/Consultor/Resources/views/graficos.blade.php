@extends('consultor::layouts.admin')
@include('consultor::layouts.menu')
@section('content')

  @include('consultor::layouts.banner')
  <div class="page-inner mt--5">
    <div class="row mt--2">
      <div class="col-md-12">
        @include('flash::message')
        <div class="card">
          @error('consultores')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
          <div class="card-body">
            @isset($desempenio_chart)
                <a href="{{route('consultor.dashboard')}}" class="text-white">
                  <button type="button" class="btn btn-outline-success" name="button">
                    regresar
                  </button>
                </a>
              <h5 class="card-title">Reporte Desempeño</h5>
              <div style="width: 50%">
                {{ $desempenio_chart->container() }}
                  <script src=https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script>
                {{ $desempenio_chart->script() }}
              </div>
            @endisset
            @isset($mensaje)
              <div class="Container">
                <h4>{{$mensaje}}</h4>
              </div>
            @endisset
          </div>
        </div>

      </div>
    </div>





@endsection
