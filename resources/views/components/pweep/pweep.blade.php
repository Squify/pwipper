<div class="pweep grey-thin-border hover">
    <div class="display-flex-row" id="header">
        <div class="repweep">
            @if($pweep->initialAuthor)
                <div>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    <a style="color: #6C757D;"
                    href="{{ url('profile', $pweep->author->pseudo) }}"><b>{{ $pweep->author->name }}</b> a repweepé
                    </a>
                </div>
            @endif
        </div>
        <div class="date">
            <small>{{ $pweep->updated_at ? $pweep->updated_at->format('d/m/Y H:i') : $pweep->created_at->format('d/m/Y H:i') }}</small>
        </div>
    </div>

    <div class="display-flex-row" id="content">
        <div class="col-2">
            @if(!$pweep->initialAuthor)
                <a href="{{ url('profile', $pweep->author->pseudo) }}">
                    <picture>
                        @if($pweep->author->image_path )
                            <img src="{{ asset('storage/' . $pweep->author->image_path) }}"
                                class="profile_pic img-fluid rounded-circle img-thumbnail">
                        @else
                            <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                                class="profile_pic img-fluid rounded-circle img-thumbnail">
                        @endif
                    </picture>
                </a>
            @else
            <a href="{{ url('profile', $pweep->initialAuthor->pseudo) }}">
                <picture>
                    @if($pweep->initialAuthor->image_path)
                        <img src="{{ asset('storage/' . $pweep->initialAuthor->image_path) }}"
                            class="profile_pic img-fluid rounded-circle img-thumbnail">
                    @else
                        <img src="{{ asset('storage/img/no_profile_pic.png') }}"
                            class="profile_pic img-fluid rounded-circle img-thumbnail">
                    @endif
                </picture>
            </a>
            @endif
        </div>
        <div class="col-10">
            <div class="display-flex-row" style="justify-content: space-between;">
                <div class="left">
                    <p class="display-flex-row">
                        @if($pweep->initialAuthor)
                            <a class="white"
                            href="{{ url('profile', $pweep->initialAuthor->pseudo) }}"><b>{{ $pweep->initialAuthor->name . ' _'}}</b></a>
                            · {{' @' . $pweep->initialAuthor->pseudo }}
                        @else
                            <a class="white"
                            href="{{ url('profile', $pweep->author->pseudo) }}"><b>{{ $pweep->author->name . ' _'}}</b></a>
                            · {{' @' . $pweep->author->pseudo }}
                        @endif
                    </p>
                </div>
                @include('components.modal.dropdown', ['pweep' => $pweep])
            </div>
            @if(Route::is('homepage') || Route::is('profile'))
                <a href="{{ route('detailsPweep', $pweep->id ) }}" style="color: whitesmoke; text-decoration: none;">
                    <p>
                        {{ $pweep->message }}
                    </p>
                    @include('components.img.pweep', ['pweep' => $pweep, 'user' => $currentUser])
                </a>
            @else
                <p>
                    @if(Route::is('search'))
                        @foreach(explode(' ', $pweep->message) as $word)
                            @if($word == $search)
                                <b><u>{{ $word }}</u></b>
                            @else
                                {{ $word }}
                            @endif
                        @endforeach
                    @else
                        {{ $pweep->message }}
                    @endif
                </p>
                @include('components.img.pweep', ['pweep' => $pweep, 'user' => $currentUser])
            @endif
        </div>
    </div>

    @if (Auth::check())
        <div class="icons-pweep white">
            <a href="#" class="white">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                </svg>
            </a>
            <a href="{{ route('repweep', $pweep->id) }}" class="white">
                <svg style="margin-right: 10px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                {{ $pweep->repweep_counter }}
            </a>
            <a href="{{ route('likePweep', $pweep->id) }}" class="white">
                @if($currentUser->like->contains($pweep))
                    <svg style="margin-right: 10px; color: #ffed4a" width="1em" height="1em" viewBox="0 0 16 16"
                         class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    {{ $pweep->like_counter }}
                @else
                    <svg style="margin-right: 10px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-star"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.523-3.356c.329-.314.158-.888-.283-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767l-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288l1.847-3.658 1.846 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.564.564 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                    </svg>
                    {{ $pweep->like_counter }}
                @endif
            </a>
            <a href="#" class="white">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-share-fill"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                </svg>
            </a>
        </div>
    @endif
</div>
