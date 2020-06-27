@extends('layouts.app-dash')

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card text-white bg-secondary">
      <div class="card-header">
        <h4 class="mb-0">Notificaciones sin leer</h4>
      </div>
      <div class="card-body">
        
        @for ($i = 0; $i < 3; $i++)
        <div class="card mb-3 text-dark bg-light border-top-0 border-right-0 border-bottom-0 border-success rounded-0" style="border-left-width: 5px;">
          <div class="card-header">
            solicitud
          </div>
          <div class="card-body">
            hello
          </div>
        </div>
        @endfor

      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card text-white bg-secondary">
      <div class="card-header">
        <h4 class="mb-0">Notificaciones leídas</h4>
      </div>
      <div class="card-body">
        
        @for ($i = 0; $i < 2; $i++)
        <div class="card mb-3 text-dark bg-light border-top-0 border-right-0 border-bottom-0 border-dark rounded-0" style="border-left-width: 5px;">
          <div class="card-header">
            solicitud
          </div>
          <div class="card-body">
            hello
          </div>
        </div>
        @endfor

      </div>
    </div>
  </div>
</div>
@endsection
