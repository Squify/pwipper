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
                <div class="form-group">
                    <textarea placeholder="Quoi de neuf docteur ?" name="message" type="text"
                              class="form-control"></textarea>
                </div>
                <hr color="#38444D">
                <div style="display: flex; flex-direction: row; align-content: space-between">
                    <div class="buttons">
                        <a href="#">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-images" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.002 4h-10a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path fill-rule="evenodd"
                                      d="M4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary">Pweeper</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider-section grey-thin-border">

        </div>
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
                        <p><b>{{ $pweep->author->name }}</b> {{ '@' . $pweep->author->pseudo }} ·
                            <small>{{ $pweep->created_at }}</small></p>
                        <p>{{ $pweep->message }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
