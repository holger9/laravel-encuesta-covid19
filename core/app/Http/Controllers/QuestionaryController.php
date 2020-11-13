<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionary;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateQuestionary;
use Session;
use Illuminate\Support\Facades\Gate;
//// TODO: VERIFICAR PERMISOS EN Controller Questionary
class QuestionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
      //verifico con el gates si tiene acceso a ese permiso
      $this->authorize('haveAccess', 'questionary.index');

      $user = User::with('roles')->find(Auth::user()->id);

    //$q = Questionary::find(1)->with('user')->orderBy('id', 'ASC')->paginate(4);

      //dd($q[0]->user_id);
      $questionaries = Questionary::orderBy('id', 'ASC')->where('user_id', Auth::user()->id)->paginate(5);
      return view('questionary.index', compact('questionaries', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      //verifico con el gates si tiene acceso a ese permiso
      $this->authorize('haveAccess', 'questionary.create');
      return view('questionary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateQuestionary $request){
      Gate::authorize('haveAccess', 'questionary.create');
      //guardamos el usuario con su rol
      Questionary::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'user_id' => Auth::user()->id
      ]);

      //array de notificacion
      $this->notification('Cuestionario', 'Guardado correctamente...', 'success');
      //redireccionamos al index
      return redirect()->route('questionary.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Questionary $questionary){
      $user = User::with('roles')->find(Auth::user()->id);
      $this->authorize('view', [$user, ['questionary.show']]);

      return view('questionary.view', compact('questionary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionary $questionary){
      $user = User::with('roles')->find(Auth::user()->id);
      $this->authorize('update', [$user, ['questionary.edit']]);
      return view('questionary.edit', compact('questionary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateQuestionary $request, Questionary $questionary){
      //actualizamos el role
      $questionary->update($request->all());

      //notificacion
      $this->notification('Cuestionario', 'Actualizado correctamente...', 'info');
      //redireccionamos al index
      return redirect()->route('questionary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionary $questionary){
      $this->authorize('haveAccess', 'questionary.destroy');
      if($questionary->delete()){
        //notificacion
        $this->notification('Cuestionario', 'Eliminado correctamente...', 'info');
      }
      else {
        //notificacion
        $this->notification('Cuestionario', 'Eliminado correctamente...', 'error');
      }
      //redireccionamos al index
      return redirect()->route('questionary.index');
    }

    public function notification($title, $message, $type){
      $notification = array(
        'title' => $title,
        'message' => $message,
        'alert-type' => $type
      );

      //creamos un mensaje flash para la peticion actual
      Session::flash('notification', $notification);
    }
}
