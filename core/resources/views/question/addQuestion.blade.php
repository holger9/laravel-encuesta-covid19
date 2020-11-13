@extends('layouts.app')

@section('title','Agregar pregunta')

@section('content')

<div class="row">
  <div class="col-12">
    @include('question.breadcrumb')
    <div class="card">
      <div class="card-header bg-danger">
        <h4 class="mb-0 text-white">Nueva pregunta</h4>
      </div>
      <div class="card-body text-center">
        <form id="formQuestion" action="{{ route('question.store') }}" method="post">
          @csrf
          <div class="container">

            <input type="hidden" name="questionary_id" value="{{ $id }}">

            <div class="form-group row">
              <label class="my-1 mr-2">T&iacute;tulo de la pregunta:</label>
              <textarea class="form-control" id="question" name="question" rows="3">{{ old('question') }}</textarea>
              <div class="invalid-feedback text-left">El título de la pregunta es requerido.</div>
            </div>

            <div class="form-group row">
              <label class="my-1 mr-2 font-weight-bold" >Opciones de la pregunta</label>
            </div>

            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_yes_no" type="radio" class="custom-control-input" name="hasOptions" value="SN" @if(old('hasOptions') == 'SN') checked @endif @if(old('hasOptions') === null) checked @endif>
                <label for="options_yes_no" class="custom-control-label">S&iacute;/No</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_yes_no_justification" type="radio" class="custom-control-input" name="hasOptions" value="SNJ" @if(old('hasOptions') == 'SNJ') checked @endif>
                <label for="options_yes_no_justification" class="custom-control-label">S&iacute;/No con justificaci&oacute;n</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_justification" type="radio" class="custom-control-input" name="hasOptions" value="J" @if(old('hasOptions') == 'J') checked @endif>
                <label for="options_justification" class="custom-control-label">S&oacute;lo justificaci&oacute;n</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_multiple" type="radio" class="custom-control-input" name="hasOptions" value="M" @if(old('hasOptions') == 'M') checked @endif>
                <label for="options_multiple" class="custom-control-label">Opciones multiples</label>
              </div>

            </div>

            <fieldset id="field_options_answer">


              <div class="form-group row">
                <label class="my-1 mr-2 >Agregar opciones multiples</label>
              </div>

              <div class="form-group row">
                <a title="Agregar" href="#" id="addOption">
                    <i data-feather="plus" class="feather-icon"></i>Agregar opci&oacute;n
                </a>
              </div>

              <div id='options'>
                <!-- options add por user -->
              </div>
            </fieldset>

            <hr>
            <a href="{{ route('question.questions', $id) }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>
            <button type="submit" class="btn btn-outline-success" onclick="validarForm(event)">
              <i data-feather="save" class="feather-icon"></i> Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@include('question.modalQuestion')

@endsection

@section('js')
<script type="text/javascript">
  alert('hola');

</script>
@endsection
