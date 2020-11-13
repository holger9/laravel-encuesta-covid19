<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //definimos un nombre al gate
        //pasando el usuario logueado y el permiso que queremos validar
        Gate::define('haveAccess', function(User $user, $slug_permission){
          //regresa true o false si el usuario tiene el permiso
          return $user->havePermission($slug_permission);//trait user
        });
    }
}
