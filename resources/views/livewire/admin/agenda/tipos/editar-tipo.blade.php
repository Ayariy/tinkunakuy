<form wire:submit.prevent="editarTipo">

    <x-adminlte-modal wire:ignore.self id="modalTipo{{ $idTipoTrans }}" title="{{ __('messages.editar') }}"
        theme="primary" icon="fas fa-lg fa-briefcase" size='lg' scrollable>

        <div class="form-group">
            <label for="tipo">{{ __('adminlte::menu.tipos') }} - {{ __('menu.kichwa') }} </label>

            <input wire:model="tipo" type="text" class="form-control  @error('tipo')  border-danger @enderror"
                id="tipo" aria-describedby="errorTipo"
                placeholder="{{ __('adminlte::menu.tipos') }} - {{ __('menu.kichwa') }} " />

            @error('tipo')
                <small id=" errorTipo" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <x-slot name="footerSlot">

            <x-adminlte-button class="mr-auto" theme="danger" label="{{ __('messages.cancel') }}"
                icon="fas fa-window-close" data-dismiss="modal" />


            <div class="spinner-border" role="status" wire:loading wire:target="editarTipo">
                <span class="sr-only">Loading...</span>
            </div>
            <x-adminlte-button wire:loading.remove wire:target="editarTipo" theme="primary" type="submit"
                label="{{ __('messages.editar') }}" icon="fas fa-save" />
        </x-slot>


    </x-adminlte-modal>
</form>
