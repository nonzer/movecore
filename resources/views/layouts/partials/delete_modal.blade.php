<div class="modal fade" id="modal-{{ $id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Suppression de {{$name}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3><i class="fas fa-exclamation-triangle text-warning"></i> Attention !</h3>
                <p>{{$sms ??  "Souhaitez-vous véritablement Supprimer ?"}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                <form action="{{ $route }}" method="post">
                    @method('delete')

                    @csrf
                    <button type="submit" class="btn btn-danger">Supprimer <i class="fas fa-check"></i></button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
