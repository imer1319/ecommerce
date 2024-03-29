<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
            </a></li>
        <li>
            <form class="form-inline mr-auto">
                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                    <button class="btn" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </li>
    </ul>
</div>
<ul class="navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" data-toggle="dropdown"
           class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                                                            src="{{ asset('assets/img/user.png') }}"
                                                                            class="user-img-radious-style">
            <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
            <div class="dropdown-title">Hello {{ Auth::user()->name }}</div>
            <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
            </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
            </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"
               class="dropdown-item has-icon text-danger"
            >
                <i class="fas fa-sign-out-alt"></i>
                Logout
                @csrf
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                </form>
            </a>
        </div>
    </li>
</ul>
