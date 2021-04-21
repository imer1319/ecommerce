<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
            <a href="{{ route('home') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Configuraciones</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
                <li><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Product Manegement</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tags.index') }}">Tags</a></li>
                <li><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
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
