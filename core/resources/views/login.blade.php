<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/img/favicon.png')}}">

    <title>Login</title>
    <!-- Custom CSS -->
    <link href="{{asset('public/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url({{asset('public/assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{asset('public/img/login/imagen.jpg')}});">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img width="80px" height="63px" src="{{asset('public/img/login/logo.png')}}" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center"></h2>
                        <p class="text-center text-dark">Ingrese su n&uacute;mero de c&eacute;dula y contrase&nacute;a para entrar al sistema.</p>
                        <form class="mt-4" method="post" action="{{url('post-login')}}">
                          @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="identification">Usuario</label>
                                        <input class="form-control" id="identification" name="identification" type="text"
                                            placeholder="Ingrese su n&uacute;mero de c&eacute;dula"
                                            autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Contrase&nacute;a</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Ingrese su contrase&nacute;a">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-success">Entrar</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    2020 <a href="https://co.sodexo.com/home.html" class="text-danger">Sodexo</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{asset('public/assets/libs/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <!--
    <script src="{{asset('public/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
-->
    <script src="{{asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
    </script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>

    <script type="text/javascript">
      //verificamos si a la vista fue enviado algun error
      @if(Session::has('message'))
        toastr.options.timeOut = 2000;
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        toastr.error("{{Session::get('message')}}", "{{Session::get('title')}}");
      @endif
    </script>
</body>

</html>
