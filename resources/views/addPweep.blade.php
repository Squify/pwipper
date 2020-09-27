@extends('layouts.base')

@section('content')
    <h1>Ajouter un pweep</h1>

    <form method="post" action="#" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Message</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
        @include('components.errors')
    </form>

@endsection
