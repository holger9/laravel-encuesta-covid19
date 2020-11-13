<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response;
use Session;
use App\User;

class AuthController extends Controller
{
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
  */
  public function index(){
    return view('login');
  }

  public function postLogin(Request $request){
    request()->validate([
      'identification' => 'required',
      'password' => 'required',
    ]);

    $credentials = $request->only('identification', 'password');

    if (Auth::attempt($credentials)) {
      // Authentication passed...
      return redirect()->intended('home');
    }

    //si ocurre un error mandamos el siguiente array de configuracion
    //y lo mandamos a la vista
    $notification = array(
      'title' => 'Error al ingresar al sistema',
    	'message' => 'Verificar usuario y/o contraseña'
    );

    return Redirect::to("/")->with($notification);
  }

  public function logout() {
    Session::flush();
    Auth::logout();
    return Redirect('/');
  }

  public function message($title, $body, $time, $position, $type){
    switch ($type) {
      case 'info':
        toastr()->info($body, $title, [
          'positionClass' => $position,
          'timeOut' => $time
        ]);
        break;
        case 'error':
          toastr()->error($body, $title, [
            'positionClass' => $position,
            'timeOut' => $time
          ]);
          break;
    }
  }

}
