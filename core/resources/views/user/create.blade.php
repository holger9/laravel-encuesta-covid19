@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('user.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Crear usuario</h4>
      </div>
      <div class="card-body">
        <h4 class="card-title"></h4>
        <form action="{{ route('user.store') }}" method="post">
          @csrf
          <div class="form-group">
              <label for="">Identificaci&oacute;n</label>
              <input type="text" name="identification" class="form-control @error('identification') is-invalid @enderror" placeholder="N&uacute;mero de c&eacute;dula" value="{{ old('identification') }}" >
              @error('identification')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="">Nombre completo</label>
              <input type="text" name="fullname" class="form-control text-lowercase @error('fullname') is-invalid @enderror" placeholder="Nombre completo" value="{{ old('fullname') }}">
              @error('fullname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Primer apellido</label>
              <input type="text" class="form-control text-lowercase @error('first_surname') is-invalid @enderror" name="first_surname" placeholder="Primer apellido" value="{{ old('first_surname') }}">
              @error('first_surname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Segundo apellido</label>
              <input type="text" class="form-control text-lowercase @error('second_surname') is-invalid @enderror" name="second_surname" placeholder="Segundo apellido" value="{{ old('second_surname') }}">
              @error('second_surname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group">
              <label for="">Email</label>
              <input type="text" name="email" class="form-control text-lowercase @error('email') is-invalid @enderror" placeholder="Ejemplo: correo@mail.com" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="">Genero</label>
              <select class="form-control custom-select @error('gender') is-invalid @enderror" name="gender" >
                <option value="" @if(old('gender') === null) checked @endif>Seleccionar</option>
                <option value="Masculino" @if(old('gender') == 'Masculino') selected @endif>Masculino</option>
                <option value="Femenino" @if(old('gender') == 'Femenino') selected @endif>Femenino</option>
              </select>
              @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label>Cargo</label>
              <input type="text" class="form-control text-lowercase @error('employment') is-invalid @enderror" name="employment" placeholder="Cargo ocupado" value="{{ old('employment') }}">
              @error('employment')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label>Celular</label>
              <input type="text" name="cellphone_number" class="form-control @error('cellphone_number') is-invalid @enderror" placeholder="N&uacute;mero celular" value="{{ old('cellphone_number') }}">
              @error('cellphone_number')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="">Rol</label>
            <select class="custom-select my-1 mr-sm-2 @error('roles') is-invalid @enderror" name="roles" >
              <option value="" @if(old('roles') === null) checked @endif>Seleccionar</option>
              @foreach($roles as $role)
                <option value="{{ $role->id }}" @if(old('roles') == $role->id) selected @endif>
                  {{ $role->name }}
                </option>
              @endforeach
            </select>
            @error('roles')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            <i data-feather="arrow-left" class="feather-icon"></i> Regresar
          </a>

          <button type="submit" class="btn btn-outline-primary">
            <i data-feather="save" class="feather-icon"></i> Guardar
          </button>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
