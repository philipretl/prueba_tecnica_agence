@extends('consultor::layouts.admin')
@include('consultor::layouts.menu')
@section('content')
  @include('consultor::layouts.banner')
  <div class="page-inner mt--5">
    <div class="row mt--2">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Seleccione los consultores a filtrar</h5>
            <form class="" action="{{route('consultor.informe')}}" method="post">
              @method('post')
              @csrf
              @isset($data)
                @if (!$data['consultoresActivos']->isEmpty())
                  <div class="row">
                    @foreach ($data['consultoresActivos'] as $consultor)
                      <div class="card offset-md">
                        <div class="card-body">
                          <button type="button" class="btn btn-outline-primary">
                            {{$consultor->co_usuario}} <span class="badge badge-light">
                              <input type="checkbox" name="consultores[]" value="$consultor->co_usuario">
                            </span>
                          </button>

                        </div>

                      </div>
                    @endforeach
                  </div>

                @endif

              @endisset


            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Generar Informe de ganancias</h5>

              <div class="card-action">
                <div class="row">
                  <button class="btn btn-primary btn-border btn-round">Relatório</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
