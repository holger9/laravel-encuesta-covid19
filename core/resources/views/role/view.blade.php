@extends('layouts.app')

@section('title','Ver rol')

@section('content')
<div class="row">
  <div class="col-12">
    @include('role.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Informaci&oacute;n  del rol</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('role.update', $role->id) }}" method="post">
          @csrf
          @method('PUT')
          <div class="container">
            <div class="form-group">
              <label for="">Nombre del rol</label>
              <input type="text" class="form-control" name="name" placeholder="Nombre del rol" value="{{ old('name', $role->name) }}" readonly>
            </div>
            <div class="form-group">
              <label for="">Descripci&oacute;n</label>
              <textarea class="form-control" name="description" rows="3" placeholder="Descripci&oacute;n" readonly>{{ old('description', $role->description) }}</textarea>
            </div>
            <hr>
            <h3>Acceso completo</h3>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessyes" class="custom-control-input" name="full-access" value="Si" @if($role['full-access'] == 'Si') checked @elseif(old('full-access') == 'Si') checked @endif disabled>
              <label class="custom-control-label" for="fullaccessyes">Sí</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="full-access" id="fullaccessno" class="custom-control-input" name="full-access" value="No" @if($role['full-access'] == 'No') checked @elseif(old('full-access') == 'No') checked @endif disabled>
              <label class="custom-control-label" for="fullaccessno">No</label>
            </div>
            <hr>
            <h3>Lista de permisos</h3>
            @foreach($permissions as $permission)
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="{{ $permission->id }}" id="permission_{{ $permission->id }}" name="permission[]" @if(is_array(old('permission')) && in_array("$permission->id", old('permission'))) checked @elseif(is_array($permissions_role) && in_array("$permission->id", $permissions_role)) checked @endif disabled>
                <label class="custom-control-label" for="permission_{{ $permission->id }}">
                  <b>{{ $permission->id }} - {{ $permission->name }}:</b> <em>{{ $permission->description }}</em>
                </label>
              </div>
            @endforeach
            <hr>
            <a href="{{ route('role.index') }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>

            <a href="{{ route('role.edit', $role->id) }}" class="btn btn-outline-success">
              <i data-feather="edit" class="feather-icon"></i> Editar
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
