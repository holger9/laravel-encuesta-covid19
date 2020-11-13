@extends('layouts.app')

@section('title','Inicio')

@section('content')
    <div class="card card-body">

        <h4 class="mb-0 text-info text-center" style="font-size:30px;"><b>5 Comportamientos en salud</b></h4>
        <div class="container-fluid">
            <div class="col-12 mt-4">
                <div class="card-group">
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="{{asset('public/img/inicio/aglomeraciones.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">1. Control de aglomeraciones</h4>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="{{asset('public/img/inicio/estado_salud.png')}}" alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title">2. Verificaci&oacute;n del estado de salud</h4>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="{{asset('public/img/inicio/desinfeccion_aseo.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">3. Desinfecci&oacute;n y aseo</h4>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="{{asset('public/img/inicio/epp.jpg')}}" alt="Card image cap" >
                        <div class="card-body">
                            <h4 class="card-title">4. Uso de elementos de protecci&oacute;n personal</h4>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                    <div class="card text-center">
                        <img class="card-img-top img-fluid" src="{{asset('public/img/inicio/distanciamiento_social.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">5. Distanciamiento social</h4>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted"></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center font-weight-bold"><span class="text-danger" style="font-size:30px;">Y recuerda: </span><span class="text-info font-italic" style="font-size:18px;">por mi salud y la de los tuyos, Yo me cuido tu te cuidas.</span></p>
    </div>
@endsection

@section('js')

<script type="text/javascript">
  //verificamos si a la vista fue enviado algun error
  @if (Session::has('notificationHome'))
    //configuracion por defecto de toastr
    toastr.options.timeOut = 2000;
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    toastr.options.positionClass = 'toast-bottom-left';
    //obtenemos el tipo de la ventana toastr
    let type = "{{ Session('notificationHome')['alert-type']}}"
    let message = "{{ Session('notificationHome')['message']}}"
    let title = "{{ Session('notificationHome')['title']}}"
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
