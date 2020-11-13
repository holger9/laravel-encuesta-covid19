@extends('layouts.app')

@section('title','Crear cuestionario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('questionary.breadcrumb')
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Crear cuestionario</h4>
      </div>
      <div class="card-body text-center">
        <form action="{{ route('questionary.store') }}" method="post">
          @csrf
          <div class="container">
            <div class="form-group row">
              <label class="my-1 mr-2">T&iacute;tulo del cuestionario</label>
              <textarea class="form-control @error('name') is-invalid @enderror" name="name" rows="3">{{ old('name') }}</textarea>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label class="my-1 mr-2">Estado</label>
            </div>
            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="status_active" type="radio" class="custom-control-input" name="status" value="Activo" @if(old('status') == 'Activo') checked @endif @if(old('status') === null) checked @endif>
                <label for="status_active" class="custom-control-label">Activo</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="status_inactive" type="radio" class="custom-control-input" name="status" value="Inactivo" @if(old('status') == 'Inactivo') checked @endif>
                <label for="status_inactive" class="custom-control-label">Inactivo</label>
              </div>
            </div>
            <hr>
            <a href="{{ route('questionary.index') }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>
            <button type="submit" class="btn btn-outline-success">
              <i data-feather="save" class="feather-icon"></i> Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
