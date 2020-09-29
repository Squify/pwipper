<div class="modal fade" id="deletePweep{{$pweep->id}}" tabindex="-1" role="dialog" aria-labelledby="modalRemoveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoveLabel">Supprimer le pweep ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label style="text-align: justify"><b>
                        Il n'est pas possible d'annuler cette opération.
                        Ce Pweep sera supprimé de votre profil, du fil des comptes qui
                        vous suivent et des résultats de recherche Pwipper.</b>
                    </label>
                    <label><u>Le pweep en question </u> : {{$pweep->message}}</label>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="{{route('deletePweep', $pweep->id)}}">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
