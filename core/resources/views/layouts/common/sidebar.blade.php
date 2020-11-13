<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                  <a class="sidebar-link sidebar-link" href="{{url('home')}}" aria-expanded="false">
                    <i data-feather="home" class="feather-icon"></i>
                    <span class="hide-menu">Inicio</span>
                  </a>
                </li>
                @can('haveAccess', 'questionary.index')
                <li class="sidebar-item @php $rutas_questionary = ['questionary.create', 'questionary.show', 'questionary.edit']; if(in_array(Route::current()->getName(), $rutas_questionary)){ echo 'selected'; } @endphp">
                  <a class="sidebar-link sidebar-link" href="{{url('questionary')}}" aria-expanded="false">
                    <i data-feather="file-text" class="feather-icon"></i>
                    <span class="hide-menu">Cuestionario</span>
                  </a>
                </li>
                @endcan
                @can('haveAccess', 'user.index')
                <li class="sidebar-item @php $rutas_user = ['user.create', 'user.show', 'user.edit']; if(in_array(Route::current()->getName(), $rutas_user)){ echo 'selected'; } @endphp">
                  <a class="sidebar-link sidebar-link" href="{{url('user')}}" aria-expanded="false">
                    <i data-feather="users" class="feather-icon"></i>
                    <span class="hide-menu">Usuarios</span>
                  </a>
                </li>
                @endcan
                @can('haveAccess', 'role.index')
                <li class="sidebar-item @php $rutas_role = ['role.create', 'role.show', 'role.edit']; if(in_array(Route::current()->getName(), $rutas_role)){ echo 'selected'; } @endphp">
                  <a class="sidebar-link sidebar-link" href="{{url('role')}}" aria-expanded="false">
                    <i data-feather="lock" class="feather-icon"></i>
                    <span class="hide-menu">Roles</span>
                  </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
