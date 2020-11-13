@extends('layouts.app')

@section('title','Nuevo rol')

@section('content')
<div class="row">
  @include('role.breadcrumb')
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Nuevo rol</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('role.store') }}" method="post">
          @csrf
          <div class="container">
            <h3>Informaci&oacute;n requerida</h3>
            <div class="form-group">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre del rol" value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripci&oacute;n">{{ old('description') }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <hr>
            <h3>Acceso completo</h3>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessyes" class="custom-control-input" name="full-access" value="Si" @if(old('full-access') == 'Si') checked @endif>
              <label class="custom-control-label" for="fullaccessyes">Sí</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessno" class="custom-control-input" name="full-access" value="No" @if(old('full-access') == 'No') checked @endif  @if(old('full-access') === null) checked @endif>
              <label class="custom-control-label" for="fullaccessno">No</label>
            </div>
            <hr>
            <h3>Lista de permisos</h3>
            @foreach($permissions as $permission)
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="{{ $permission->id }}" id="permission_{{ $permission->id }}" name="permission[]" @if(is_array(old('permission')) && in_array("$permission->id", old('permission'))) checked @endif>
                <label class="custom-control-label" for="permission_{{ $permission->id }}">
                  <b>{{ $permission->id }} - {{ $permission->name }}:</b> <em>{{ $permission->description }}</em>
                </label>
              </div>
            @endforeach
            <hr>
            <a href="{{ route('role.index') }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>
            <button type="submit" class="btn btn-outline-primary">
              <i data-feather="save" class="feather-icon"></i> Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
