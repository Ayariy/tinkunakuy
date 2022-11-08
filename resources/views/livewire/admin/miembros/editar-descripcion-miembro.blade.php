<form wire:submit.prevent="editarDescripcionMiembro">

    <x-adminlte-modal wire:ignore.self id="modalMiembroDescripcion{{$idMiemDes}}"
        title="{{__('messages.editar')}} {{__('messages.description')}} - {{$idioma}}" theme="primary"
        icon="fas fa-lg fa-briefcase" size='lg' scrollable>


        <div class="form-group">
            <label for="title{{$idMiemDes}}">{{__('messages.description')}}</label>
            <textarea wire:model="descripcionTrans" type="text"
                class="form-control  @error('descripcionTrans')  border-danger @enderror" id="title{{$idMiemDes}}"
                aria-describedby="errorDescripcionKi" placeholder="{{__('messages.description')}}" rows="3">
                </textarea>

            @error('descripcionTrans')
            <small id=" errorDescripcionKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        {{--
        <x-adminlte-input wire:model="descripcionTrans" name="title{{$idMiemDes}}"
            label="{{__('messages.description')}}" placeholder="{{__('messages.cargo')}}" disable-feedback />

        @error('descripcionTrans')
        <x-adminlte-alert theme="danger" icon="" dismissable>
            {{$message}}
        </x-adminlte-alert>
        @enderror --}}

        <x-slot name="footerSlot">
            <div wire:loading.remove wire:target="editarDescripcionMiembro">
                <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                    icon="fas fa-window-close" data-dismiss="modal" />
                <x-adminlte-button theme="primary" type="submit" label="{{__('messages.editar')}}" icon="fas fa-save" />
            </div>
            <div class="row justify-content-center" wire:loading wire:loading.grid
                wire:target="editarDescripcionMiembro">

                <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </x-slot>


    </x-adminlte-modal>
</form>