@extends('layouts/base')

@section('content')
    <div class="main-container profile-container">
        <div class="grey-thin-border">

            @include('auth.profile.informations', ['user' => $user])
            <ul style="margin-top: 10px; text-align: center;" class="nav nav-tabs col-12" id="myTab" role="tablist">
                <li class="nav-item col-4">
                    <a class="nav-link active" href="#pweep">Pweeps</a>
                </li>
                <li class="nav-item col-4">
                    <a class="nav-link" href="{{ route('mediaProfile', $user->pseudo)}}">Médias</a>
                </li>
                <li class="nav-item col-4">
                <a class="nav-link" href="{{ route('likesProfile', $user->pseudo)}}">Mentions j'aime</a>
                </li>
            </ul>
        </div>
        <div class="pweep-list">
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
    </div>
@endsection
