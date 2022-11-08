<form wire:submit.prevent="editarCargo">

    <x-adminlte-modal wire:ignore.self id="modalCargo{{$idCargoTrans}}"
        title="{{__('messages.editar')}} {{$cargotrans}}" theme="primary" icon="fas fa-lg fa-briefcase" size='lg'
        scrollable>

        <x-adminlte-input wire:model="cargotrans" name="title{{$idCargoTrans}}" label="{{__('menu.cargo')}}"
            placeholder="{{__('messages.cargo')}}" disable-feedback />

        @error('cargotrans')
        <x-adminlte-alert theme="danger" icon="" dismissable>
            {{$message}}
        </x-adminlte-alert>
        @enderror

        <x-slot name="footerSlot">

            <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                icon="fas fa-window-close" data-dismiss="modal" />
            <x-adminlte-button theme="primary" type="submit" label="{{__('messages.editar')}}" icon="fas fa-save" />
        </x-slot>


    </x-adminlte-modal>
</form>