<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission\Models\Role;
use App\User;
use App\Permission\Models\Permission;
use App\Http\Requests\ValidacionUser;
use App\Http\Requests\ValidacionProfile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      //verifico con el gates si tiene acceso a ese permiso
      $this->authorize('haveAccess', 'user.index');
      //obtengo los usuarios con su respectivo rol
      $users = User::with('roles')->orderBy('id', 'ASC')->paginate(4);
      //envio a la vista los usuarios
      return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $this->authorize('haveAccess', 'user.create');
      $roles = Role::orderBy('name', 'ASC')->get();
      return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionUser $request){

        Gate::authorize('haveAccess', 'user.create');

        //guardamos el usuario con su rol
        $user = User::create([
          'identification' => $request['identification'],
          'fullname' => $request['fullname'],
          'first_surname' => $request['first_surname'],
          'second_surname' => $request['second_surname'],
          'email' => $request['email'],
          'gender' => $request['gender'],
          'employment' => $request['employment'],
          'cellphone_number' => $request['cellphone_number'],
          'password' => Hash::make($request['identification'])
        ]);

        $user->roles()->sync([$request->roles]);

        //array de notificacion
        $this->notification('Usuario', 'Guardado correctamente...', 'success');

        //redireccionamos al index
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user){
      $this->authorize('view', [$user, ['user.show', 'userown.show']]);
      //obtenemos todos los roles ordenados por nombres
      $roles = Role::orderBy('name', 'ASC')->get();
      return view('user.view', compact('user', 'roles'));
    }

   public function profile($id){
     //obtengo el usuario Actual
     $user = User::find($id);
     $this->authorize('view', [$user, ['user.show', 'userown.show']]);
     //obtenemos todos los roles ordenados por nombres
     $roles = Role::orderBy('name', 'ASC')->get();
     return view('user.profile.view', compact('user', 'roles'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
      $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);
      //obtenemos todos los roles ordenados por nombres
      $roles = Role::orderBy('name', 'ASC')->get();

      return view('user.edit', compact('user', 'roles'));
    }

    public function editProfile($id){
      //obtengo el usuario Actual
      $user = User::find($id);
      $this->authorize('update', [$user, ['user.edit', 'userown.edit']]);
      //obtenemos todos los roles ordenados por nombres
      $roles = Role::orderBy('name', 'ASC')->get();

      return view('user.profile.edit', compact('user', 'roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionUser $request, User $user){
      $user->update($request->all());
      //creamos los roles
      $user->roles()->sync($request->get('roles'));

      //notificacion
      $this->notification('Usuario', 'Actualizado correctamente...', 'info');
      return redirect()->route('user.index');
    }

    public function updateProfile(ValidacionProfile $request, $id){
      //obtengo el usuario Actual
      $user = User::find($id);

      $user->update($request->all());
      //creamos los roles
      $user->roles()->sync($request->get('roles'));

      //notificacion
      $this->notification('Usuario', 'Actualizado correctamente...', 'info');

      //obtenemos todos los roles ordenados por nombres
      $roles = Role::orderBy('name', 'ASC')->get();
      
      return view('user.profile.view', compact('user', 'roles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){

      $this->authorize('haveAccess', 'user.destroy');

      if($user->delete()){
        //notificacion
        $this->notification('Usuario', 'Eliminado correctamente...', 'info');
      }
      else {
        //notificacion
        $this->notification('Usuario', 'Eliminado correctamente...', 'error');
      }

      //redireccionamos al index
      return redirect()->route('user.index');

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
