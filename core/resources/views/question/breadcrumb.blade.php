@php
  $rutas_question = [
    'index' => ['question.index', 'Todos los cuestionarios'],
    'create' => ['question.create', 'Agregar pregunta'],
    'show' => ['question.show', 'Ver pregunta'],
    'edit' => ['question.edit', 'Editar pregunta']
  ];

  $ruta_actual = Route::current()->getName();
  $breadcrumb = '';

  switch($ruta_actual){
    case $rutas_question['index'][0]:
      $breadcrumb = $rutas_question['index'][1];
    break;
    case $rutas_question['create'][0]:
      $breadcrumb = $rutas_question['create'][1];
    break;
    case $rutas_question['show'][0]:
      $breadcrumb = $rutas_question['show'][1];
    break;
    case $rutas_question['edit'][0]:
      $breadcrumb = $rutas_question['edit'][1];
    break;
  }

@endphp

  <ol class="breadcrumb mb-2">
    <li class="breadcrumb-item">
      <a href="{{ url('home')}}">Inicio</a>
    </li>
    @if($ruta_actual == 'question.index')
    <li class="breadcrumb-item active">
      {{ $breadcrumb }}
    </li>
    @elseif($ruta_actual != 'question.index')
      <li class="breadcrumb-item">
        <a href="{{ url('questionary') }}">Todos los cuestionarios</a>
      </li>
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @endif
  </ol>
