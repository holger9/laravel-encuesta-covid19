@extends('layouts.app')

@section('title','Editar rol')

@section('content')

<div class="row justify-content-center">
  <div class="col-12">
    @include('role.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Editar role: {{ $role->name }}</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('role.update', $role->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="container">
            <h3>Informaci&oacute;n requerida</h3>
            <div class="form-group">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre del rol" value="{{ old('name', $role->name) }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descripci&oacute;n">{{ old('description', $role->description) }}</textarea>
              @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <hr>
            <h3>Acceso completo</h3>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessyes" class="custom-control-input" name="full-access" value="Si" @if($role['full-access'] == 'Si') checked @elseif(old('full-access') == 'Si') checked @endif>
              <label class="custom-control-label" for="fullaccessyes">Si</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessno" class="custom-control-input" name="full-access" value="No" @if($role['full-access'] == 'No') checked @elseif(old('full-access') == 'No') checked @endif>
              <label class="custom-control-label" for="fullaccessno">No</label>
            </div>
            <hr>
            <h3>Lista de permisos</h3>
            @foreach($permissions as $permission)
              <div class="custom-control custom-checkbox">
                <input type="checkbox"
                  class="custom-control-input" value="{{ $permission->id }}"
                  id="permission_{{ $permission->id }}" name="permission[]"
                  @if(is_array(old('permission')) && in_array("$permission->id", old('permission'))) checked
                  @elseif(is_array($permissions_role) && in_array("$permission->id", $permissions_role)) checked @endif
                >
                <label class="custom-control-label" for="permission_{{ $permission->id }}">
                  {{ $permission->id }} - {{ $permission->name }} <em>{{ $permission->description }}</em>
                </label>
              </div>
            @endforeach
            <hr>
            <a href="{{ route('role.index') }}" class="btn btn-outline-secondary">
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
