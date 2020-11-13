@php
  $rutas_role = [
    'index' => ['role.index', 'Todos los roles'],
    'create' => ['role.create', 'Crear nuevo rol'],
    'show' => ['role.show', 'Ver rol'],
    'edit' => ['role.edit', 'Editar rol']
  ];

  $ruta_actual = Route::current()->getName();
  $breadcrumb = '';

  switch($ruta_actual){
    case $rutas_role['index'][0]:
      $breadcrumb = $rutas_role['index'][1];
    break;
    case $rutas_role['create'][0]:
      $breadcrumb = $rutas_role['create'][1];
    break;
    case $rutas_role['show'][0]:
      $breadcrumb = $rutas_role['show'][1];
    break;
    case $rutas_role['edit'][0]:
      $breadcrumb = $rutas_role['edit'][1];
    break;
  }

@endphp

  <ol class="breadcrumb mb-2">
    <li class="breadcrumb-item">
      <a href="{{ url('home')}}">Inicio</a>
    </li>
    @if($ruta_actual == 'role.index')
    <li class="breadcrumb-item active">
      {{ $breadcrumb }}
    </li>
    @elseif($ruta_actual != 'role.index')
      <li class="breadcrumb-item">
        <a href="{{ url('role') }}">Todos los roles</a>
      </li>
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @endif
  </ol>
