<div>
    @if($order->status_order === "passed")
        <button wire:click="start_delivery" wire:loading.remove class="shadow-sm btn btn-md bg-lime">
            <b>Démarrer la livraison</b>
            <i class="fas fa-truck"></i>
        </button>
        <br>
        <div wire:loading class="text-center">
            <i class="fas fa-2x fa-history fa-spin"></i><br>
            En cours de démarrage...
        </div>
    @elseif($order->status_order === "in pending")
        <div class="text-center @if($status) d-none @endif">
            <i class="text-lime fas fa-2x fa-refresh fa-spin"></i><br>
            <span class="text-lime">Livraison Démarrée</span> <br>
            Excellente livraison à vous...
        </div>
        <div class="mt-2">
            @if($status)
                {{--<div class="form-group">
                    <label for="signature">Espace réservé au client <br><small>(Le client doit signé dans le champ ci-dessous)</small></label>
                    <input type="text" wire:model="signature" id="signature" class="@error('signature') is-invalid @enderror col-5 mb-2 mx-auto form-control" style="height: 125px">
                    @error('signature')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>--}}
                <div class="form-group">
                    <button wire:click="$set('status', false)" class="btn btn-sm bg-gray-dark">Annuler</button>
                    <button wire:click="validate_order"  class="btn btn-sm bg-lime shadow-sm">Valider</button>
                </div>
            @else
                <button data-toggle="modal" data-target="#modal" class="btn btn-sm bg-warning shadow-sm"><i class="fas fa-times"></i> Décliné</button>
                <button wire:click="$set('status', true)" class="ml-2 btn btn-sm bg-lime shadow-sm">livré <i class="fas fa-check"></i></button>

                <div class="modal fade" id="modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title">Confirmation d'annulation livraison</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Etes-vous sûr de vouloir décliné cette livraison ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-dark shadow-sm" data-dismiss="modal">Non</button>
                                <button wire:click="decline_order" class="btn btn-sm bg-warning shadow-sm">Décliné</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            @endif
        </div>
    @endif
</div>
