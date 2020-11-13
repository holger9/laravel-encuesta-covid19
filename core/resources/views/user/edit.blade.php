@extends('layouts.app')

@section('title','Editar Usuario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('user.breadcrumb')    
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white"><b>Editar usuario:</b> {{ "$user->fullname $user->first_surname $user->second_surname" }}</h4>
      </div>
      <div class="card-body">
        <h4 class="card-title"></h4>
        <form action="{{ route('user.update', $user->id) }}"  method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="">Identificaci&oacute;n</label>
              <input type="text" name="identification" class="form-control @error('identification') is-invalid @enderror" placeholder="N&uacute;mero de c&eacute;dula" value="{{ old('identification', $user['identification'])}}">
              @error('identification')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="">Nombre completo</label>
              <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Nombre completo" value="{{ old('identification',$user['fullname']) }}">
              @error('fullname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="">Primer apellido</label>
              <input type="text" class="form-control @error('first_surname') is-invalid @enderror" name="first_surname" placeholder="Primer apellido"  value="{{ old('first_surname', $user['first_surname']) }}">
              @error('first_surname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="">Segundo apellido</label>
              <input type="text" class="form-control @error('second_surname') is-invalid @enderror" name="second_surname" placeholder="Segundo apellido"  value="{{ old('second_surname', $user['second_surname']) }}">
              @error('second_surname')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ejemplo: correo@mail.com"  value="{{ old('email', $user['email']) }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-row">
            <!-- inicio select genero -->
            <div class="col-md-4 mb-3">
              <label for="">Genero</label>
              <select class="form-control custom-select @error('gender') is-invalid @enderror" name="gender" >
                <option value="" @if(old('gender') === null) checked @endif>Seleccionar</option>
                <option value="Masculino" @if(old('gender', $user->gender) == 'Masculino') selected @endif>Masculino</option>
                <option value="Femenino" @if(old('gender', $user->gender) == 'Femenino') selected @endif>Femenino</option>
              </select>
              @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <!-- fin select genero -->
            <div class="col-md-4 mb-3">
              <label>Cargo</label>
              <input type="text" class="form-control @error('employment') is-invalid @enderror" name="employment" placeholder="Cargo ocupado" value="{{$user['employment']}}">
              @error('employment')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-4 mb-3">
              <label>Celular</label>
              <input type="text" name="cellphone_number" class="form-control @error('cellphone_number') is-invalid @enderror" placeholder="N&uacute;mero celular" value="{{$user['cellphone_number']}}">
              @error('cellphone_number')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <!-- inicio select role -->
          <div class="form-group">
            <select class="form-control @error('roles') is-invalid @enderror" name="roles">
              <option value="" @if(old('roles') === null) checked @endif>Seleccionar</option>
              @foreach($roles as $role)
                <option value="{{ $role->id }}"
                  @isset($user->roles[0]->name)
                    @if($role->name == $user->roles[0]->name)
                      selected
                    @endif
                  @endisset
                >
                  {{ $role->name }}
                </option>
              @endforeach
            </select>
            @error('roles')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <!-- inicio select role -->

          <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            <i data-feather="arrow-left" class="feather-icon"></i> Regresar
          </a>
          <button type="submit" class="btn btn-outline-success">
            <i data-feather="edit" class="feather-icon"></i> Editar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
