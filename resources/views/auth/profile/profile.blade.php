@extends('layouts/base')

@section('content')
    <div class="main-container profile-container">
        <div class="grey-thin-border">
            @if($user->banner_path)
                <img src="{{ asset('storage/' . $user->banner_path) }}" width="100%" height="240px"/>
            @else
                <img src="https://www.angelxp.eu/image/Twitter/anime/original05.jpg" width="100%" height="240px"/>
            @endif

            @include('auth.profile.banner', ['user' => $user])

                <ul style="margin-top: 10px; text-align: center;" class="nav nav-tabs col-12" id="myTab" role="tablist">
                    <li class="nav-item col-4">
                        <a class="nav-link active" id="pweep-tab" data-toggle="tab" href="#pweep" aria-controls="pweep"
                        aria-selected="true">Pweeps</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link" href="{{ route('mediaProfile', $user->pseudo)}}" aria-controls="media"
                        aria-selected="false">Médias</a>
                    </li>
                    <li class="nav-item col-4">
                    <a class="nav-link" href="{{ route('likesProfile', $user->pseudo)}}" aria-controls="like"
                        aria-selected="false">Mentions j'aime</a>
                    </li>
                </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active pweep-list" id="pweep" role="tabpanel"
                 aria-labelledby="pweep-tab">
                @foreach($pweeps as $pweep)
                    @include('components.pweep.pweep', ['pweep' => $pweep, 'currentUser' => $currentUser ? $currentUser : $user])
                @endforeach
                @if(!$pweeps)
                    <div class="pweep grey-thin-border" style="text-align: center;">
                        <p>Aucun pweep pour le moment</p>
                    </div>
                @endif
                <div class="grey-thin-border"></div>
            </div>
            <div class="tab-pane pweep-list" id="media" role="tabpanel" aria-labelledby="media-tab">
                @foreach($medias as $media)
                    @include('components.pweep.pweep', ['pweep' => $media, 'currentUser' => $currentUser ? $currentUser : $user])
                @endforeach
                @if(!$medias)
                    <div class="pweep grey-thin-border" style="text-align: center;">
                        <p>Aucun pweep avec image pour le moment</p>
                    </div>
                @endif
                <div class="grey-thin-border"></div>
            </div>
            <div class="tab-pane pweep-list" id="like" role="tabpanel" aria-labelledby="like-tab">
                @foreach($likes as $pweepLike)
                    @include('components.pweep.pweep', ['pweep' => $pweepLike, 'currentUser' => $currentUser ? $currentUser : $user])
                @endforeach
                @if($user->like->count() == 0)
                    <div class="pweep grey-thin-border" style="text-align: center;">
                        <p>Aucun pweep liké pour le moment</p>
                    </div>
                @endif
                <div class="grey-thin-border"></div>
            </div>
        </div>
    </div>
@endsection
