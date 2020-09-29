<!-- Pop up modal edit -->
<div class="modal fade" id="modalRemove" tabindex="-1" role="dialog" aria-labelledby="modalRemoveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoveLabel" style="color: black;">Supprimer le pweep ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="message" style="color: black;">
                            Il n'est pas possible d'annuler cette opération.
                            Ce Pweep sera supprimé de votre profil, du fil des comptes qui
                            vous suivent et des résultats de recherche Pwipper.
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="{{route('deletePweep', $pweep->id)}}">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- End pop up modal edit -->