@extends('layouts.app')

@section('title','Usuarios')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Usuarios registrados</h4>
      </div>
      <div class="card-body">
        <h4 class="card-title"></h4>
        @include('user.breadcrumb')
        <a class="btn btn-success"  href="{{ route('user.create') }}">
          <i data-feather="plus" class="feather-icon"></i>
          Nuevo usuario
        </a>
        <hr>
        <div class="table-responsive">
          <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
            <thead  class="bg-danger text-white">
              <tr>
                <th>#</th>
                <th>Identificaci&oacute;n</th>
                <th>Nombre completo</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Rol</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @php
                $id = 1;
              @endphp

              @foreach($users as $user)
              <tr>
                <td>{{ $id++ }}</td>
                <td>{{ $user['identification'] }}</td>
                <td>{{ $user['fullname'] }}</td>
                <td>{{ $user['first_surname'] }}</td>
                <td>{{ $user['second_surname'] }}</td>
                <td>
                  @isset($user->roles[0]->name)
                    {{ $user->roles[0]->name }}
                  @endisset
                </td>
                <td>
                  @can('view', [$user, ['user.show', 'userown.show']])
                  <a class="sidebar-link" href="{{ route('user.show', $user->id) }}" aria-expanded="false">
                    <i data-feather="eye" class="feather-icon"></i>
                  </a>
                  @endcan
                  @can('view', [$user, ['user.edit', 'userown.edit']])
                  <a class="sidebar-link" href="{{ route('user.edit', $user->id) }}" aria-expanded="false">
                    <i data-feather="edit" class="feather-icon"></i>
                  </a>
                  @endcan
                  @can('haveAccess', 'user.destroy')
                  <a class="sidebar-link" href="#" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('delete-user-form{{$user->id}}').submit();">
                    <i data-feather="trash" class="feather-icon"></i>
                  </a>
                  <form id="delete-user-form{{$user->id}}" action="{{ route('user.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                  </form>
                  @endcan
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
  //verificamos si a la vista fue enviado algun error
  @if (Session::has('notification'))
    //configuracion por defecto de toastr
    toastr.options.timeOut = 2000;
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.positionClass = 'toast-bottom-right';
    //obtenemos el tipo de la ventana toastr
    let type = "{{ Session('notification')['alert-type']}}"
    let message = "{{ Session('notification')['message']}}"
    let title = "{{ Session('notification')['title']}}"
    switch(type){
      case 'info':
        toastr.info(message, title);
      break;
      case 'warning':
        toastr.warning(message, title);
      break;
      case 'error':
        toastr.error(message, title);
      break;
      case 'success':
        toastr.success(message, title);
      break;
    }
  @endif
</script>
@endsection
