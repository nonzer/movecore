<div>
        @if($visible)
                <textarea wire:model.lazy="observation" placeholder="Apporter une observation..." class="p-1" cols="30" rows="5"></textarea>
                <button wire:click="hiddenObservation" class="btn btn-default btn-sm btn-block">Annuler</button>
        @endif
            <button wire:click="showObservation" class="btn btn-dark btn-sm btn-block"><span class="fas fa-tty"></span> Relancer</button>
</div>
