@extends('layouts.app')

@section('title','Editar cuestionario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('questionary.breadcrumb')
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Editar cuestionario</h4>
      </div>
      <div class="card-body text-center">
        <form action="{{ route('questionary.update', $questionary->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="container">
            <div class="form-group row">
              <label class="my-1 mr-2">T&iacute;tulo del cuestionario</label>
              <textarea class="form-control @error('name') is-invalid @enderror" name="name" rows="3">{{ old('name', $questionary->name) }}</textarea>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label class="my-1 mr-2">Estado</label>
            </div>
            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="status_active" type="radio" class="custom-control-input" name="status" value="Activo" @if($questionary['status'] == 'Activo') checked @elseif(old('status') == 'Activo') checked @endif>
                <label for="status_active" class="custom-control-label">Activo</label>

              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="status_inactive" type="radio" class="custom-control-input" name="status" value="Inactivo" @if($questionary['status'] == 'Inactivo') checked @elseif(old('status') == 'Inactivo') checked @endif>
                <label for="status_inactive" class="custom-control-label">Inactivo</label>
              </div>
            </div>
            <hr>
            <a href="{{ route('questionary.index') }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>
            <button type="submit" class="btn btn-outline-success">
              <i data-feather="edit" class="feather-icon"></i> Editar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
