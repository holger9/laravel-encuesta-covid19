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
        <form action="{{ route('question.store') }}" method="post">
          @csrf
          <div class="container">
            <div class="form-group row">
              <input type="hidden" name="questionary_id" value="{{ $id }}">
              <label class="my-1 mr-2">T&iacute;tulo de la pregunta:</label>
              <textarea class="form-control @error('question') is-invalid @enderror" name="question" rows="3">{{ old('question') }}</textarea>
              @error('question')
                <div class="invalid-feedback text-left">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label class="my-1 mr-2">Tiene opciones</label>
            </div>
            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_yes" type="radio" class="custom-control-input" name="hasOptions" value="Si" @if(old('hasOptions') == 'Si') checked @endif @if(old('hasOptions') === null) checked @endif>
                <label for="options_yes" class="custom-control-label">S&iacute;</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="options_no" type="radio" class="custom-control-input" name="hasOptions" value="No" @if(old('hasOptions') == 'No') checked @endif>
                <label for="options_no" class="custom-control-label">No</label>
              </div>
            </div>
            <fieldset id="field_options_answer">
            <div class="form-group row">
              <label for="">Cantidad de opciones de respuesta</label>
              <select class="custom-select my-1 mr-sm-2 @error('quantity') is-invalid @enderror" id="quantity" >
                <option value="" @if(old('quantity') === null) checked @endif>Seleccionar</option>
                <option value="2" >2 Respuestas</option>
                <option value="3" >3 Respuestas</option>
                <option value="4" >4 Respuestas</option>
                <option value="5" >5 Respuestas</option>
                <option value="6" >6 Respuestas</option>
                <option value="7" >7 Respuestas</option>
                <option value="8" >8 Respuestas</option>
                <option value="9" >9 Respuestas</option>
                <option value="10" >10 Respuestas</option>
              </select>
              @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <!-- opciones de respuesta -->
            <div class="form-group row">
              <label class="my-1 mr-2">Valores de las opciones de respuesta</label>
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option1" placeholder="option 1">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option2" placeholder="option 2">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option3" placeholder="option 3">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option4" placeholder="option 4">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option5" placeholder="option 5">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option6" placeholder="option 6">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option7" placeholder="option 7">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option8" placeholder="option 8">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option9" placeholder="option 9">
            </div>
            <div class="form-group row">
              <input type="text" class="form-control option-answer" id="option10" placeholder="option 10">
            </div>
            <!-- opciones de respuesta -->
            <div class="form-group row">
              <label class="my-1 mr-2">Tiene opci&oacute;n multiple</label>
            </div>
            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="multiple_yes" type="radio" class="custom-control-input" name="isMultiple" value="Si" @if(old('isMultiple') == 'Si') checked @endif>
                <label for="multiple_yes" class="custom-control-label">S&iacute;</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="multiple_no" type="radio" class="custom-control-input" name="isMultiple" value="No" @if(old('isMultiple') == 'No') checked @endif  @if(old('hasObservation') === null) checked @endif>
                <label for="multiple_no" class="custom-control-label">No</label>
              </div>
            </div>
          </fieldset>
          <div class="form-group row">
              <label class="my-1 mr-2">Tiene observaci&oacute;n</label>
            </div>
            <div class="form-group row">
              <div class="custom-control custom-radio custom-control-inline">
                <input id="observation_yes" type="radio" class="custom-control-input" name="hasObservation" value="Si" @if(old('hasObservation') == 'Si') checked @endif>
                <label for="observation_yes" class="custom-control-label">S&iacute;</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input id="observation_no" type="radio" class="custom-control-input" name="hasObservation" value="No" @if(old('hasObservation') == 'No') checked @endif  @if(old('hasObservation') === null) checked @endif>
                <label for="observation_no" class="custom-control-label">No</label>
              </div>
            </div>
            <hr>
            <a href="{{ route('question.questions', $id) }}" class="btn btn-outline-secondary">
              <i data-feather="arrow-left" class="feather-icon"></i> Regresar
            </a>
            <button type="submit" class="btn btn-outline-success">
              <i data-feather="save" class="feather-icon"></i> Guardar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
  //referencia
  let optionYes = document.querySelector('#options_yes');
  let optionNo = document.querySelector('#options_no');
  let radioMultipleNo = document.querySelector('#multiple_no');
  let radioObservationYes = document.querySelector('#observation_yes');
  let radioObservationNo = document.querySelector('#observation_no');
  let selectQuantity = document.querySelector('#quantity');
  let fieldsetOptionsAnswer = document.querySelector('#field_options_answer');
  let allOptions = document.querySelectorAll('.option-answer');

  //events
  document.addEventListener("DOMContentLoaded", function(event) {
    disabledInputs();
    if (optionNo.checked) {
      fieldsetOptionsAnswer.disabled = true;
    }
    else {
      fieldsetOptionsAnswer.disabled = false;
    }
  });

  optionYes.addEventListener('click', function () {
    fieldsetOptionsAnswer.disabled = false;
    radioObservationNo.checked = true;

  });

  optionNo.addEventListener('click', function () {
    selectQuantity.options.selectedIndex = 0;
    radioMultipleNo.checked = true;
    radioObservationYes.checked = true;
    fieldsetOptionsAnswer.disabled = true;
  });

  selectQuantity.addEventListener('change', viewInputs);

  function viewInputs() {
    //obtengo cuantas opciones fueron agregadas
    let select = selectQuantity.options[selectQuantity.selectedIndex].value;
    disabledInputs();
    if (select !== '' || select !== null) {
      for (let i = 0; i < select; i++) {
        allOptions[i].disabled = false;
      }
    }
  }

  function disabledInputs() {
    for (let i = 0; i < allOptions.length; i++) {
      allOptions[i].disabled = true;
      allOptions[i].value = '';
    }
  }

</script>
@endsection
