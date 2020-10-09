@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="text-align: center; margin-top: 4rem">
            <h1> Votre message a bien été envoyé à notre central !</h1><br/>
            <a href="{{route('homepage')}}" class="btn btn-primary"> Retour à la page d'accueil </a>
        </div>
    </div>
</div>
@endsection
