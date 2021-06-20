<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo"/> <span
                class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Route::is('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown {{ Route::is('roles.*') || Route::is('users.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Configuraciones</span></a>
            <ul class="dropdown-menu">
                @can('roles_index')
                    <li class="{{ Route::is('roles.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                    </li>
                @endcan
                @can('users_index')
                    <li class="{{ Route::is('users.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                @endcan
            </ul>
        </li>
        <li class="dropdown {{ Route::is('tags.*') || Route::is('categories.*') || Route::is('products.*') ? 'active' : '' }}">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Product Manegement</span></a>
            <ul class="dropdown-menu">
                @can('tags_index')
                    <li class="{{ Route::is('tags.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('tags.index') }}">Tags</a>
                    </li>
                @endcan
                @can('categories_index')
                    <li class="{{ Route::is('categories.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                @endcan
                @can('products_index')
                    <li class="{{ Route::is('products.*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                @endcan
            </ul>
        </li>
        @can('user_management_access')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('password.edit') }}">
                    <i data-feather="briefcase"></i>
                    <span class="nav-link-text">Cambiar contraseña</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>
