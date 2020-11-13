@extends('layouts.app')

@section('title','Roles')

@section('content')

<div class="row">
  <div class="col-12">
    @include('role.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Roles</h4>
      </div>

      <div class="card-body">
        @can('haveAccess', 'role.create')
          <a class="btn btn-success float-left" href="{{ route('role.create') }}">
            <i data-feather="plus" class="feather-icon"></i>
            Nuevo rol
          </a>
        @endcan
        <br><br>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead  class="bg-danger text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripci&oacute;n</th>
                <th scope="col">Acceso completo</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)
                <tr>
                  <th scope="row">{{ $role->id}}</th>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->description }}</td>
                  <td>{{ $role['full-access'] }}</td>
                  <td>
                    @can('haveAccess', 'role.show')
                      <a class="sidebar-link" href="{{ route('role.show', $role->id) }}" aria-expanded="false">
                        <i data-feather="eye" class="feather-icon"></i>
                      </a>
                    @endcan
                  </td>
                  <td>
                    @can('haveAccess', 'role.edit')
                      <a class="sidebar-link" href="{{ route('role.edit', $role->id) }}" aria-expanded="false">
                        <i data-feather="edit" class="feather-icon"></i>
                      </a>
                    @endcan
                  </td>
                  <td>
                    @can('haveAccess', 'role.destroy')
                      <a class="sidebar-link" href="#" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('delete-role-form{{$role->id}}').submit();">
                        <i data-feather="trash" class="feather-icon"></i>
                      </a>
                      <form id="delete-role-form{{$role->id}}" action="{{ route('role.destroy', $role->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                      </form>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $roles->links() }}
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
