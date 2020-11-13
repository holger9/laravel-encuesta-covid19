<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
      //seteamos el mensaje, titulo y tipo de ventana para el toastr
      $this->notification('Bienvenido', 'Hola ' . Auth::user()->fullname . ', recuerda tener en cuenta los 5 comportamientos en salud.', 'success');
      //retornamos la vista
      return view('home');
    }

    public function notification($title, $message, $type){
      $notification = array(
        'title' => $title,
        'message' => $message,
        'alert-type' => $type
      );

      //creamos un mensaje flash para la peticion actual
      Session::flash('notificationHome', $notification);
    }
}
