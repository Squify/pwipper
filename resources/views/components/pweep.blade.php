<div class="pweep grey-thin-border">
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
            @if($pweep->initialAuthor)
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
            @else
                <a href="{{ url('profile', $pweep->author->pseudo) }}">
                    <picture>
                        @if($pweep->author->image_path)
                            <img src="{{ asset('storage/' . $pweep->author->image_path) }}"
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
            <p>
                {{ $pweep->message }}
            </p>
            @include('components.img.pweep', ['pweep' => $pweep])
        </div>
    </div>

    @if (Auth::check())
        <div class="icons-pweep">
            <a href="#">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat"
                     fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                </svg>
            </a>
            <a href="{{ route('repweep', $pweep->id) }}">
                <svg style="margin-right: 10px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-right"
                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                {{ $pweep->repweep_number }}
            </a>
            <a href="{{ route('likePweep', $pweep->id) }}">
                @if($currentUser->like->contains($pweep))
                    <svg style="margin-right: 10px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                    {{ $pweep->users_like->count() }}
                @else
                    <svg style="margin-right: 10px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart"
                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                    {{ $pweep->users_like->count() }}
                @endif
            </a>
            <a href="#">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-share-fill"
                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                </svg>
            </a>
        </div>
    @endif
</div>
