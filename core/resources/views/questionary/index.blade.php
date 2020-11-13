@extends('layouts.app')

@section('title','Cuestionario')

@section('content')

<div class="row">
  <div class="col-12">
    @include('questionary.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Cuestionarios</h4>
      </div>

      <div class="card-body">
        @can('haveAccess', 'questionary.create')
          <a class="btn btn-success float-left" href="{{ route('questionary.create') }}">
            <i data-feather="plus" class="feather-icon"></i>
            Nuevo cuestionario
          </a>
        @endcan
        <br><br>
        <hr>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="bg-danger text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @php
                $id = 1;
              @endphp
              @foreach($questionaries as $questionary)
              <tr>
                <td>{{ $id++ }}</td>
                <td>{{ $questionary->name }}</td>
                <td>{{ $questionary->status }}</td>
                <td>
                  @can('view', [$user, ['questionary.show']])
                    <a title="Ver cuestionario" class="sidebar-link" href="{{ route('questionary.show', $questionary->id) }}" aria-expanded="false">
                      <i data-feather="eye" class="feather-icon"></i>
                    </a>
                  @endcan
                  @can('view', [$user, ['questionary.edit']])
                    <a title="Editar cuestionario"  class="sidebar-link" href="{{ route('questionary.edit', $questionary->id) }}" aria-expanded="false">
                      <i data-feather="edit" class="feather-icon"></i>
                    </a>
                  @endcan
                  @can('haveAccess', 'questionary.destroy')
                    <a title="Eliminar cuestionario"  class="sidebar-link" href="#" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('delete-questionary-form{{$questionary->id}}').submit();">
                      <i data-feather="trash" class="feather-icon"></i>
                    </a>
                    <form id="delete-questionary-form{{$questionary->id}}" action="{{ route('questionary.destroy', $questionary->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                    </form>
                  @endcan
                  @can('haveAccess', 'question.questions')
                    <a title="Agregar preguntas al cuestionario"  class="sidebar-link" href="{{ route('question.questions', $questionary->id) }}" aria-expanded="false">
                      <i data-feather="file-plus" class="feather-icon"></i>
                    </a>
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
