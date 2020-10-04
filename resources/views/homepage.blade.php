@extends('layouts/base')

@section('content')
    <div class="main-container">
        @if (Auth::check())
            <div class="new-pweep grey-thin-border">
                <div class="col-2">
                    <picture>
                        @if(Auth::user()->image_path)
                            <img src="{{ asset('storage/' . Auth::user()->image_path) }}"
                                 class="profile_pic img-fluid rounded-circle img-thumbnail">
                        @else
                            <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                 class="profile_pic img-fluid rounded-circle img-thumbnail">
                        @endif
                    </picture>
                </div>

                <div class="col-10">
                    <form action="{{ route('storePweep') }}" id="img" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <textarea placeholder="Quoi d'neuf docteur ?" name="message" type="text"
                                  class="form-control"></textarea>
                        </div>
                        <hr style="color: #38444D">
                        <div style="display: flex; flex-direction: row; justify-content: space-between;">
                            <div class="image-upload">
                                <label for="image_path" style="cursor: pointer;">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-images"
                                         fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M12.002 4h-10a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1zm-10-1a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-10zm4 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                        <path fill-rule="evenodd"
                                              d="M4 2h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1v1a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2h1a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </label>
                                <input id="image_path" name="images[]" type="file" multiple/>
                                <div id="preview"></div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Pweeper</button>
                            </div>
                        </div>
                        @include('components.errors')
                    </form>
                </div>
            </div>
            <div class="divider-section grey-thin-border"></div>
        @endif
        <div class="pweep-list">
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
                            @if (Auth::check())
                                <div class="right">
                                    <div class="dropdown">
                                        <button style="color: white" class="btn" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-toggle="modal"
                                               href="#updatePweep{{$pweep->id}}">Éditer</a>
                                            <a class="dropdown-item" data-toggle="modal"
                                               href="#deletePweep{{$pweep->id}}">Supprimer</a>
                                        </div>
                                        @include('components.modal.edit', ['pweep' => $pweep])
                                        @include('components.modal.remove', ['pweep' => $pweep])
                                    </div>
                                </div>
                            @endif
                        </div>
                        <p>{{ $pweep->message}}</p>
                        @if($pweep->image_path_1)
                            <img src="{{ asset('img/' . $pweep->image_path_1) }}" width="195px" height="130px"/>
                        @endif
                        @if($pweep->image_path_2)
                            <img src="{{ asset('img/' . $pweep->image_path_2) }}" width="195px" height="130px"/>
                        @endif
                        @if($pweep->image_path_3)
                            <img src="{{ asset('img/' . $pweep->image_path_3) }}" width="195px" height="130px"/>
                        @endif
                        @if($pweep->image_path_4)
                            <img src="{{ asset('img/' . $pweep->image_path_4) }}" width="195px" height="130px"/>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function previewImages() {

            var preview = document.querySelector('#preview');
            preview.innerHTML = null;
            if (this.files) {
                if (this.files.length > 4)
                    return alert("Maximum 4 images");
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " n'est pas une image ou un gif");
                } else {
                    var reader = new FileReader();
                    reader.addEventListener("load", function () {
                        var image = new Image();
                        image.height = 130;
                        image.width = 195;
                        image.title = file.name;
                        image.src = this.result
                        preview.appendChild(image);
                    });
                    reader.readAsDataURL(file);
                }
            }
        }

        document.querySelector('#image_path').addEventListener("change", previewImages);
    </script>
@endsection

