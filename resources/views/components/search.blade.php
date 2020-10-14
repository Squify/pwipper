@extends('layouts/base')

@section('content')

    <div class="main-container">
        @include('components.errors')
        <h2 style="margin-top: 20px; margin-bottom: 20px;"> Recherche : "{{$search}}" </h2>
        <div class="grey-thin-border"></div>
            <div class="pweep-list">
                @foreach($pweeps as $pweep)
                    @include('components.pweep.pweep', ['pweep' => $pweep, 'currentUser' => $user, 'search' => $search])
                @endforeach
            </div>
        <div class="grey-thin-border"></div>
        @if(empty($pweeps))
            <p style="margin-top: 12px;"> Aucun résultat <p>
        @endif
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
