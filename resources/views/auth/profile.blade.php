@extends('layouts/base')

@section('content')
    <div class="main-container profile-container">
        <div class="grey-thin-border">
            @if($user->banner_path)
                <img src="{{ asset('storage/' . $user->banner_path) }}" width="100%" height="240px"/>
            @else
                <img src="https://www.angelxp.eu/image/Twitter/anime/original05.jpg" width="100%" height="240px"/>
            @endif

            <div style="padding-left: 18px">
                <div style="height: 142px; width: 142px; position: relative; top: -80px; margin-bottom: -75px;">
                    @if($user->banner_path)
                        <img src="{{ asset('storage/' . $user->banner_path) }}"
                             class="img-fluid rounded-circle img-thumbnail" style="background: #15202B; border: unset">
                    @else
                        <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                             class="img-fluid rounded-circle img-thumbnail" style="background: #15202B; border: unset">
                    @endif
                </div>
                <p>
                    <b>{{ $user->name }}</b>
                </p>
                <p style="color: #8393A1">
                    {{ '@' . $user->pseudo }}
                </p>
                <p>
                    {{ $user->description }}
                </p>
                <p style="color: #8393A1">
                    @if(Auth::user()->website)
                        <a href="{{ $user->website }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-link-45deg" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.001 1.001 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                <path
                                    d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 0 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 0 0-4.243-4.243L6.586 4.672z"/>
                            </svg> {{ $user->website}}
                        </a> -
                    @endif
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gift" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zM1 4v2h6V4H1zm8 0v2h6V4H9zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5V7zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5H7z"/>
                    </svg>
                    Naissance le {{ date('d/m/Y', strtotime($user->birthdate)) }} <br>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-event" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                    </svg>
                    A rejoint Pwipper en {{ $user->created_at->format('F yy') }}
                </p>
            </div>

            <ul style="margin-top: 10px" class="nav nav-tabs col-12" id="myTab" role="tablist">
                <li class="nav-item col-4">
                    <a class="nav-link active" id="pweep-tab" data-toggle="tab" href="#pweep" aria-controls="pweep"
                       aria-selected="true">Pweeps</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" aria-controls="media"
                       aria-selected="false">Médias</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" id="like-tab" data-toggle="tab" href="#like" aria-controls="like"
                       aria-selected="false">Mentions j'aime</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active pweep-list grey-thin-border" id="pweep" role="tabpanel"
                 aria-labelledby="pweep-tab">
                @foreach($pweeps as $pweep)
                    <div class="pweep grey-thin-border">
                        <div class="col-2">
                            <picture>
                                @if($pweep->author->image_path)
                                    <img src="{{ asset('storage/' . $pweep->author->image_path) }}"
                                         class="profile_pic img-fluid rounded-circle img-thumbnail">
                                @else
                                    <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                         class="profile_pic img-fluid rounded-circle img-thumbnail">
                                @endif
                            </picture>
                        </div>
                        <div class="col-10">
                            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                <div class="left">
                                    <p style="display: flex; flex-direction: row; justify-content: space-around;">
                                        <b>{{ $pweep->author->name . ' _'}}</b>{{' @' . $pweep->author->pseudo }} ·
                                        <small>{{ $pweep->created_at->format('H:m') }}</small>
                                    </p>
                                </div>
                                <div class="right">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg style="overflow: auto scroll;" width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-arrow-bar-down" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                                        </svg>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Editer</a>
                                            <!-- Bootstrap modal améliorer -->
                                            <a class="dropdown-item" href="{{route('deletePweep', $pweep->id)}}">Supprimer</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Signaler</a>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <p>{{ $pweep->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane pweep-list grey-thin-border" id="media" role="tabpanel" aria-labelledby="media-tab">
                @foreach($medias as $media)
                    <div class="pweep grey-thin-border">
                        <div class="col-2">
                            <picture>
                                @if($media->author->image_path)
                                    <img src="{{ asset('storage/' . $media->author->image_path) }}"
                                         class="profile_pic img-fluid rounded-circle img-thumbnail">
                                @else
                                    <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                         class="profile_pic img-fluid rounded-circle img-thumbnail">
                                @endif
                            </picture>
                        </div>
                        <div class="col-10">
                            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                                <div class="left">
                                    <p style="display: flex; flex-direction: row; justify-content: space-around;">
                                        <b>{{ $media->author->name . ' _'}}</b>{{' @' . $media->author->pseudo }} ·
                                        <small>{{ $media->created_at->format('H:m') }}</small>
                                    </p>
                                </div>
                                <div class="right">
                                    <a href="#" class="nav-link" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg style="overflow: auto scroll;" width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-arrow-bar-down" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                                        </svg>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Editer</a>
                                            <!-- Bootstrap modal améliorer -->
                                            <a class="dropdown-item" href="{{route('deletePweep', $media->id)}}">Supprimer</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Signaler</a>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <p>{{ $media->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="tab-pane pweep-list grey-thin-border" id="like" role="tabpanel" aria-labelledby="like-tab">
                <h1>Récupérer les mentions j'aime et mettre la même boucle qu'en haut</h1>
            </div>
        </div>
    </div>
@endsection
