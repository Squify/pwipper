<form action="{{route('updatePweep', $pweep->id)}}" method="POST">
    {{ csrf_field() }}
    <div class="modal fade" id="updatePweep{{$pweep->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel" style="color: black;">Editer mon pweep n°{{$pweep->id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="message" style="color: black;"> Message </label>
                            <textarea style="height: 150px;" name="message" type="text" class="form-control">
                                {{$pweep->message}}
                            </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</form>
