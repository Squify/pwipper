<nav class="navbar navbar-expand-lg ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('homepage') }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Accueil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell-fill" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                    </svg>
                    Notifications
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-square-dots-fill"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hash" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.39 12.648a1.32 1.32 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1.06 1.06 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.512.512 0 0 0-.523-.516.539.539 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532 0 .312.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531 0 .313.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242l-.515 2.492zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
                    </svg>
                    Découvrir
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
                                <a class="dropdown-item" href="{{ url('profile') }}">Mon compte</a>
                                <a class="dropdown-item" href="{{ route('updateProfile') }}">Modifier mon compte</a>
                                <a class="dropdown-item" href="{{ route('contact') }}">Nous contacter</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}">Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @else
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pas connecté ?
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('login') }}">Connexion</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('contact') }}">Nous contacter</a>
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
            <form class="form-inline" action="{{route('search')}}">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher sur Pwipper" aria-label="search" name="q"
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
