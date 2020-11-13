<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ValidacionRol;
use Session;

class RoleController extends Controller {
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  */
  public function index(){
    //verifico el acceso con el gates
    Gate::authorize('haveAccess', 'role.index');
    //obtengo la lista de roles ingresados en el sistema
    $roles = Role::orderBy('id', 'ASC')->paginate(4);
    //regreso la vista con el listado de roles
    return view('role.index', compact('roles'));
  }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
  */
  public function create(){
    //verifico el acceso con el gates
    Gate::authorize('haveAccess', 'role.create');
    //obtenemos todos los permisos igual que all()
    $permissions = Permission::get();
    //regreso la vista con el listado de permisos
    return view('role.create', compact('permissions'));
  }

  /**
    * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
  */
  public function store(ValidacionRol $request){
    //verifico el acceso con el gates
    Gate::authorize('haveAccess', 'role.create');

    //guardamos el role
    $role = Role::create($request->all());

    //verificamos si existe algun permiso seleccionado
    if ($request->get('permission')) {
      $permissions = $request->get('permission');
      //creamos los permisos
      $role->permissions()->sync($permissions);
    }
    //array de notificacion
    $this->notification('Rol', 'Guardado correctamente...', 'info');
    //redireccionamos al index
    return redirect()->route('role.index');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role){
      //verifico el acceso con la policies
      $this->authorize('haveAccess', 'role.show');

      //creamos un array para almacenar los permisos del rol actual
      $permissions_role = [];
      //recorremos los permisos del rol y obtenemos solo los id de los permisos y los almacenamos en el array
      foreach ($role->permissions as $permission) {
        $permissions_role[] = $permission->id;
      }

      //obtenemos todos los permisos igual que all()
      $permissions = Permission::get();
      return view('role.view', compact('permissions', 'role', 'permissions_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role){
      //verifico el acceso con la policies
      $this->authorize('haveAccess', 'role.edit');

      //creamos un array para almacenar los permisos del rol actual
      $permissions_role = [];
      //recorremos los permisos del rol y obtenemos solo los id de los permisos y los almacenamos en el array
      foreach ($role->permissions as $permission) {
        $permissions_role[] = $permission->id;
      }

      //obtenemos todos los permisos igual que all()
      $permissions = Permission::get();
      return view('role.edit', compact('permissions', 'role', 'permissions_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionRol $request, Role $role){
      //verifico el acceso con la policies
      $this->authorize('haveAccess', 'role.update');

      //actualizamos el role
      $role->update($request->all());
      //obtengo los permisos especificados en el formulario
      $permissions = $request->get('permission');
      //creamos los permisos al rol actual
      $role->permissions()->sync($permissions);

      //notificacion
      $this->notification('Rol', 'Actualizado correctamente...', 'info');
      //redireccionamos al index
      return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role){
      //verifico el acceso con el gates
      $this->authorize('haveAccess', 'role.destroy');

      if($role->delete()){
        //notificacion
        $this->notification('Rol', 'Eliminado correctamente...', 'info');
      }
      else {
        //notificacion
        $this->notification('Rol', 'Ocurrio un error al eliminar el rol...', 'error');
      }

      //redireccionamos al index
      return redirect()->route('role.index');

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
