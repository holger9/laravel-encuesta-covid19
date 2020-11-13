@extends('layouts.app')

@section('title','Ver cuestionario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('questionary.breadcrumb')
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Informaci&oacute;n del cuestionario</h4>
      </div>
      <div class="card-body text-center">
        <div class="container">
          <div class="form-group row">
            <label class="my-1 mr-2">T&iacute;tulo del cuestionario</label>
            <textarea class="form-control" name="name" rows="3" cols="" readonly>{{ $questionary->name }}</textarea>
          </div>
          <div class="form-group row">
            <label class="my-1 mr-2">Estado</label>
          </div>
          <div class="form-group row">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="status" value="Activo" @if($questionary['status'] == 'Activo') checked @elseif(old('status') == 'Activo') checked @endif disabled>
              <label class="custom-control-label">Activo</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" name="status" value="Inactivo" @if($questionary['status'] == 'Inactivo') checked @elseif(old('status') == 'Inactivo') checked @endif disabled>
              <label class="custom-control-label">Inactivo</label>
            </div>
          </div>
          <hr>
          <a href="{{ route('questionary.index') }}" class="btn btn-outline-secondary">
            <i data-feather="arrow-left" class="feather-icon"></i> Regresar
          </a>
          <a href="{{ route('questionary.edit', $questionary->id) }}" class="btn btn-outline-success">
            <i data-feather="edit" class="feather-icon"></i> Editar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
