<nav class="navbar navbar-expand-lg ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('adminUsers') }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people-fill" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                    </svg>
                    Utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminPweeps') }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                        <path
                            d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                    </svg>
                    Pweeps
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminNotifications') }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                    </svg>
                    Notifications
                </a>
            </li>
        </ul>

        <div class="brand">
            <a href="{{ route('homepage') }}">
                <img style="width: 40px; height: 40px" src="{{ asset('storage/img/pwipper_logo_light.png') }}">
            </a>
        </div>

        <div class="search-bar">
            @if(Auth::check())
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <picture>
                                    @if(Auth::user()->image_path)
                                        <img src="{{ asset('storage/' . Auth::user()->image_path) }}"
                                             class="profile_pic_nav img-fluid rounded-circle img-thumbnail">
                                    @else
                                        <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                             class="profile_pic_nav img-fluid rounded-circle img-thumbnail">
                                    @endif
                                </picture>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <h6 class="dropdown-header">Mon compte</h6>
                                <a class="dropdown-item" href="{{ url('profile', Auth::user()->pseudo) }}">Mon
                                    compte</a>
                                <a class="dropdown-item" href="{{ route('updateProfile', Auth::user()->pseudo) }}">Modifier
                                    mon compte</a>
                                <a class="dropdown-item" href="{{ route('contact') }}">Nous contacter</a>
                                @if(Auth::user()->isAdmin)
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Administrer</h6>
                                    <a class="dropdown-item" href="{{ route('adminUsers') }}">Utilisateurs</a>
                                    <a class="dropdown-item" href="{{ route('adminPweeps') }}">Pweeps</a>
                                    <a class="dropdown-item" href="{{ route('adminNotifications') }}">Notifications</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
            <form class="form-inline" action="{{route('search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher sur Pwipper" aria-label="search"
                           name="q"
                           aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text search-button" id="basic-addon1">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd"
                                  d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</nav>
