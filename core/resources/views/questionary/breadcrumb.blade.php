@php
  $rutas_questionary = [
    'index' => ['questionary.index', 'Todos los cuestionarios'],
    'create' => ['questionary.create', 'Crear nuevo cuestionario'],
    'show' => ['questionary.show', 'Ver cuestionario'],
    'edit' => ['questionary.edit', 'Editar cuestionario']
  ];

  $ruta_actual = Route::current()->getName();
  $breadcrumb = '';

  switch($ruta_actual){
    case $rutas_questionary['index'][0]:
      $breadcrumb = $rutas_questionary['index'][1];
    break;
    case $rutas_questionary['create'][0]:
      $breadcrumb = $rutas_questionary['create'][1];
    break;
    case $rutas_questionary['show'][0]:
      $breadcrumb = $rutas_questionary['show'][1];
    break;
    case $rutas_questionary['edit'][0]:
      $breadcrumb = $rutas_questionary['edit'][1];
    break;
  }

@endphp

  <ol class="breadcrumb mb-2">
    <li class="breadcrumb-item">
      <a href="{{ url('home')}}">Inicio</a>
    </li>
    @if($ruta_actual == 'questionary.index')
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @elseif($ruta_actual != 'questionary.index')
      <li class="breadcrumb-item">
        <a href="{{ url('questionary') }}">Todos los cuestionarios</a>
      </li>
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @endif
  </ol>
