@if (Auth::check() && Auth::id() === $pweep->author_id)
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
                @if(!$pweep->initialAuthor)
                    <a class="dropdown-item" data-toggle="modal" 
                        href="#updatePweep{{$pweep->id}}">Éditer</a>
                @endif
                    <a class="dropdown-item" data-toggle="modal" 
                        href="#deletePweep{{$pweep->id}}">Supprimer</a>
            </div>
            @include('components.modal.edit', ['pweep' => $pweep])
            @include('components.modal.remove', ['pweep' => $pweep])
        </div>
    </div>
@endif
