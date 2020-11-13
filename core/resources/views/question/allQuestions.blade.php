@extends('layouts.app')

@section('title','Preguntas')

@section('content')

<div class="row">
  <div class="col-12">
    @include('question.breadcrumb')
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="mb-0 text-white">Preguntas </h4>
      </div>

      <div class="card-body">
        <p>A continuacion agregue las preguntas del cuestionario con titulo <b>{{ $questionary->name }}</b></p>
        @can('haveAccess', 'question.addQuestion')
          <a class="btn btn-success float-left" href="{{ route('question.addQuestion', $id) }}">
            <i data-feather="plus" class="feather-icon"></i>
            Agregar pregunta
          </a>
        @endcan
        <br><br>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead  class="bg-danger text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tiene opciones</th>
                <th scope="col">Opci&oacute;n multiple</th>
                <th scope="col">Tiene observaci&oacute;n</th>
                <th colspan="3">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @php
                $id = 1;
              @endphp
              @foreach($questions as $question)
                <tr>
                  <td>{{ $id++ }}</td>
                  <td>{{ $question->question }}</td>
                  <td>{{ $question->hasOptions }}</td>
                  <td>{{ $question->isMultiple }}</td>
                  <td>{{ $question->hasObservation }}</td>
                  <td>
                    @can('haveAccess', 'question.show')
                      <a title="Ver pregunta" class="sidebar-link" href="{{ route('question.show', $question->id) }}" aria-expanded="false">
                        <i data-feather="eye" class="feather-icon"></i>
                      </a>
                    @endcan
                  </td>
                  <td>
                    @can('haveAccess', 'question.edit')
                      <a title="Editar pregunta" class="sidebar-link" href="{{ route('question.edit', $question->id) }}" aria-expanded="false">
                        <i data-feather="edit" class="feather-icon"></i>
                      </a>
                    @endcan
                  </td>
                  <td>
                    @can('haveAccess', 'question.destroy')
                      <a title="Eliminar pregunta" class="sidebar-link" href="#" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('delete-question-form{{$question->id}}').submit();">
                        <i data-feather="trash" class="feather-icon"></i>
                      </a>
                      <form id="delete-question-form{{$question->id}}" action="{{ route('question.destroy', $question->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                      </form>
                    @endcan
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $questions->links() }}
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
