@extends('layouts.app')

@section('title','Ver Usuario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('user.breadcrumb')
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Informaci&oacute;n del usuario</h4>
      </div>
      <div class="card-body text-center">
        <div>
          <!-- verifico el genero para mostrar una imagen segun el mismo -->
          @if($user['gender'] == 'Masculino')
            <img src="{{asset('public/assets/images/user/men.png')}}" class="img-lg rounded-circle mb-4" alt="profile image">
          @elseif ($user['gender'] == 'Femenino')
            <img src="{{asset('public/assets/images/user/women.png')}}" class="img-lg rounded-circle mb-4" alt="profile image">
          @endif
          <!-- Visualizo el nombre y el cargo segun el usuario -->
          <h4  class="card-title text-uppercase">{{ "$user[fullname] $user[first_surname] $user[second_surname]" }}</h4>
          <p class="text-muted mb-0">{{ $user['employment'] }}</p>
        </div>
        <div class="border-top pt-3">
          <div class="row"> <!-- div row -->
            <div class="table-responsive"> <!-- div tabla -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Identificacion</th>
                    <th scope="col">Correo electronico</th>
                    <th scope="col">Numero celular</th>
                    <th scope="col">Genero</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{ $user['identification'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['cellphone_number'] }}</td>
                    <td>{{ $user['gender'] }}</td>
                  </tr>
                </tbody>
              </table>
            </div> <!-- end div tabla -->
            <div class="col-md-12">
              <h4 class="card-title mt-3">Roles asignados:
              @foreach($user->roles as $role)
                <span class="badge badge-danger">{{ $role->name }}</span>
              @endforeach
              </h4>
            </div>
          </div> <!-- end div row -->
        </div>
        <hr>
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
          <i data-feather="arrow-left" class="feather-icon"></i> Regresar
        </a>
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-success">
          <i data-feather="edit" class="feather-icon"></i> Editar
        </a>
      </div>
    </div>
  </div>
</div>

@endsection
