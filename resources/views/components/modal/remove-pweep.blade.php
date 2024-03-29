<div class="modal fade" id="deletePweep{{ $pweep->id }}" tabindex="-1" role="dialog" aria-labelledby="modalRemoveLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(!$pweep->initialAuthor)
                    <h5 class="modal-title" id="modalRemoveLabel">Supprimer le pweep ?</h5>
                @else
                    <h5 class="modal-title" id="modalRemoveLabel">Supprimer le repweep ?</h5>
                @endif
                <button style="color: white" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                        <path fill-rule="evenodd"
                              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label style="text-align: justify"><b>
                        @if(!$pweep->initialAuthor)
                            Il n'est pas possible d'annuler cette opération. <br>
                            Ce Pweep sera supprimé définitivement du fil d'actualité, de votre profil, et des résultats
                            de recherche Pwipper.</b>
                        @else
                            Il n'est pas possible d'annuler cette opération. <br>
                            Ce repweep sera supprimé de votre fil d'actualité et sur votre profil.</b>
                        @endif
                    </label><br><br>
                    <label>
                        @if(!$pweep->initialAuthor)
                            <u>Le pweep en question</u> : <br>
                        @else
                            <u>Le message du repweep</u> : <br>
                        @endif
                        {{ $pweep->message }}
                    </label><br>
                    @if($pweep->image_path_1 === null)
                        <label> <u> Pas d'image</u>
                    @elseif($pweep->image_path_2 === null)
                        <label> <u>Image</u> : <br>
                    @else
                        <label> <u>Images</u> : <br>
                    @endif
                        @include('components.img.pweep', ['pweep' => $pweep])
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="{{ route('deletePweep', $pweep->id) }}">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
