@php
  $rutas_user = [
    'index' => ['user.index', 'Todos los usuarios'],
    'create' => ['user.create', 'Crear nuevo usuario'],
    'show' => ['user.show', 'Ver usuario'],
    'edit' => ['user.edit', 'Editar usuario']
  ];

  $ruta_actual = Route::current()->getName();
  $breadcrumb = '';

  switch($ruta_actual){
    case $rutas_user['index'][0]:
      $breadcrumb = $rutas_user['index'][1];
    break;
    case $rutas_user['create'][0]:
      $breadcrumb = $rutas_user['create'][1];
    break;
    case $rutas_user['show'][0]:
      $breadcrumb = $rutas_user['show'][1];
    break;
    case $rutas_user['edit'][0]:
      $breadcrumb = $rutas_user['edit'][1];
    break;
  }

@endphp

  <ol class="breadcrumb mb-2">
    <li class="breadcrumb-item">
      <a href="{{ url('home')}}">Inicio</a>
    </li>
    @if($ruta_actual == 'user.index')
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @elseif($ruta_actual != 'user.index')
      <li class="breadcrumb-item">
        <a href="{{ url('user') }}">Todos los usuarios</a>
      </li>
      <li class="breadcrumb-item active">
        {{ $breadcrumb }}
      </li>
    @endif
  </ol>
