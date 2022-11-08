<form wire:submit.prevent="editarInstitucion">
    <x-adminlte-modal wire:ignore.self id="modalInstitucion{{$idModal}}" title="{{$tituloTrans}}"
        theme="{{$modalColor}}" icon="fas fa-lg fa-university" size='lg' scrollable>
        <x-adminlte-input wire:model="tituloTrans" name="title{{$idModal}}" label="{{__('messages.title')}}"
            placeholder="{{__('messages.title_placeholder')}}" disable-feedback />

        @error('tituloTrans')
        <x-adminlte-alert theme="danger" icon="" dismissable>
            {{$message}}
        </x-adminlte-alert>
        @enderror

        <x-adminlte-textarea wire:model="textoTrans" name="description{{$idModal}}" rows=4
            label="{{__('messages.description')}}" placeholder="{{__('messages.description_placeholder')}}" />
        @error('textoTrans')
        <x-adminlte-alert theme="danger" icon="" dismissable>
            {{$message}}
        </x-adminlte-alert>
        @enderror


        <x-slot name="footerSlot">
            {{-- <div class="modal-footer"> --}}

                <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                    icon="fas fa-window-close" data-dismiss="modal" />
                <x-adminlte-button type="submit" theme="{{$modalColor}}" label="{{__('messages.save')}}"
                    icon="fas fa-save" />
                {{--
            </div> --}}
        </x-slot>



    </x-adminlte-modal>
</form>