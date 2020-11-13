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
              <label id="lblRespuesta" class="form-control">Opciones de respuesta
              <input type="hidden" id="total" name="total">
              <a title="Agregar" href="#" id="addOption" data-toggle="modal" data-target="#exampleModal">
                  <i data-feather="plus" class="feather-icon"></i>Agregar
              </a>
              </label>
              <div class="invalid-feedback text-left">Debe agregar al menos dos opciones de respuesta para la pregunta actual.</div>
            </div>


            <div id='options'>
              <!-- options add por user -->
            </div>

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
  //referencia
  let optionYes = document.querySelector('#options_yes');
  let optionNo = document.querySelector('#options_no');
  let radioMultipleNo = document.querySelector('#multiple_no');
  let radioObservationYes = document.querySelector('#observation_yes');
  let radioObservationNo = document.querySelector('#observation_no');
  let selectQuantity = document.querySelector('#quantity');
  let fieldsetOptionsAnswer = document.querySelector('#field_options_answer');
  let allOptions = document.querySelectorAll('.option-answer');
  let options = document.querySelector('#options');
  let addOption = document.querySelector('#addOption');
  let total = document.querySelector('#total');
  let answers = document.querySelector('#options')

  let countOption = 0, elementId = 90;

  //events
  document.addEventListener("DOMContentLoaded", function(event) {
    localStorage.setItem("answer", '');
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
    addOption.style.display = 'inline';
  });

  optionNo.addEventListener('click', function () {
    removeAllInput();
    total.value = 0;
    countOption = 0;
    radioMultipleNo.checked = true;
    radioObservationYes.checked = true;
    fieldsetOptionsAnswer.disabled = true;
    addOption.style.display = 'none';
  });

  addOption.addEventListener('click', addInput);

  function validarForm(e) {
    e.preventDefault();
    let lblRespuesta = document.querySelector('#lblRespuesta');
    let question = document.querySelector('#question');
    let formQuestion = document.querySelector('#formQuestion');
    let quantityAnswer = answers.children.length;
    if (total.value < 2) {
      lblRespuesta.classList.add('is-invalid');
    }
    if (question.value == "") {
      question.classList.add('is-invalid');
    }
    else{
      //formQuestion.submit();
      console.log('hola');

    }
  }

  function addInput(e) {
    e.preventDefault();
    //input a agregar
    let html = `<div class="input-group">
                  <input class="form-control py-2" name="answers[]" placeholder="Ingrese respuesta">
                  <span class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" onclick="javascript:removeInput(${elementId}); return false;">
                    <span class="text-danger">X</span>
                  </button>
                  </span>
                </div>`;
      //creamos el div que contendra el input
      let newElement = document.createElement('div');
      newElement.classList.add('form-group', 'row', 'option-answer');
      newElement.setAttribute('id', elementId++);
      newElement.innerHTML = html;
      //agregamos el div creado con su input al div padre
      options.appendChild(newElement);
      total.value = ++countOption;
  }

  function removeInput(elementId) {
      // Removes an element from the document
      let element = document.getElementById(elementId);
      element.parentNode.removeChild(element);
      total.value = --countOption;
  }

  function removeAllInput() {
    let numberOptions = options.children.length;
    let items = [];
    for (let i = 0; i < numberOptions; i++) {
      items.push(options.children[i].id);
    }

    items.forEach((item, i) => {
      document.getElementById(item).remove();
    });
  }

</script>
@endsection
