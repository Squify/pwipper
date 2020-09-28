@extends('layouts.base')

@section('title')
    Accueil
@endsection

@section('content')
<div class="detailsPost_container">
    <h1>Bienvenue sur Pweep</h1>

    <div class="row center">
        @foreach($pweeps as $pweep)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{$pweep->id}}</h5>
                        <p class="card-text">{{$pweep->message}}</p>
                        <p>Pweep crée le {{$pweep->created_at->format('d/m/Y à H:m')}}</p>
                        <a href="#" class="btn btn-warning">Modifier</a>
                        <form method="post" action="{{route('deletePweep', $pweep->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
