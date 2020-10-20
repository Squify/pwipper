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
                        @include('components.error.errors')
                    </form>
                </div>
            </div>
            <div class="divider-section grey-thin-border"></div>
        @endif
        <div class="pweep-list">
            @if(sizeof($pweeps) > 0)
                @foreach($pweeps as $pweep)
                    @include('components.pweep.pweep', ['pweep' => $pweep, 'currentUser' => $user])
                @endforeach
            @else
                <div class="pweep grey-thin-border" style="text-align: center;">
                    <p>Aucun pweep pour le moment</p>
                </div>
            @endif
        </div>
        <div class="grey-thin-border"></div>
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
