@extends('layouts/base')

@section('content')
    <div class="main-container">
        <div class="new-pweep grey-thin-border">
            <div class="col-2">
                <picture>
                    <img src="{{ asset('storage/img/pwipper_logo_light.png') }}"
                         class="profile_pic img-fluid rounded-circle img-thumbnail">
                </picture>
            </div>
            <div class="col-10">
                <form action="{{route('addPweep')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea placeholder="Quoi d'neuf docteur ?" name="message" type="text"class="form-control"></textarea>
                    </div>
                    <hr color="#38444D">
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <div class="buttons">
                            <a href="#" type="file" name="image" accept="image/png">
                                <svg  width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg" >
                                    <path fill-rule="evenodd"
                                        d="M12.002 4h-10a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path fill-rule="evenodd"
                                        d="M4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
                                </svg>
                            </a>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Pweeper</button>
                            @include('components.errors')
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="divider-section grey-thin-border"></div>
        <div class="pweep-list grey-thin-border">
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
                                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg style="overflow: auto scroll;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
                                    </svg>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a type="button" class="dropdown-item" data-toggle="modal"  href="#updatePweep{{$pweep->id}}">Editer</a>
                                        <a type="button" class="dropdown-item" data-toggle="modal" href="#deletePweep{{$pweep->id}}"> Supprimer</a>
                                    </div>
                                    @include('components.modal.edit', ['pweep' => $pweep])
                                    @include('components.modal.remove', ['pweep' => $pweep])
                                </a>
                            </div>
                        </div>
                        <p>{{ $pweep->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
