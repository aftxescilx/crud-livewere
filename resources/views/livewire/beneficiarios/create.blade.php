<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Beneficiario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <!-- <div class="form-group">
                <label for="idBeneficiario"></label>
                <input wire:model="idBeneficiario" type="text" class="form-control" id="idBeneficiario" placeholder="Idbeneficiario">@error('idBeneficiario') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> -->
            <div class="form-group">
                <label for="nombre"></label>
                <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="rfc"></label>
                <input wire:model="rfc" type="text" class="form-control" id="rfc" placeholder="Rfc">@error('rfc') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <!-- <div class="form-group">
                <label for="estatus"></label>
                <input wire:model="estatus" type="text" class="form-control" id="estatus" placeholder="Estatus">@error('estatus') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> -->

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
