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
                    <a class="nav-link" href="{{ route('profile')}}">Pweeps</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" href="{{ route('mediaProfile', $user->pseudo)}}">Médias</a>
                </li>
                <li class="nav-item col-4">
                <a class="nav-link active" href="{{ route('likesProfile', $user->pseudo)}}">Mentions j'aime</a>
                </li>
            </ul>

        </div>
        <div class="pweep-list">
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
@endsection
