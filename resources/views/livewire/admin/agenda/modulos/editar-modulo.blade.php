<form wire:submit.prevent="editarModulo">

    <x-adminlte-modal wire:ignore.self id="modalModulo{{$idModulo}}"
        title="{{__('messages.editar')}}" theme="primary" icon="fas fa-lg fa-briefcase" size='lg'
        scrollable>

        <div class="form-group">
            <label for="moduloKi">{{__('adminlte::menu.modulos')}} - {{__('menu.kichwa')}}  </label>

            <input wire:model="moduloKi" type="text" class="form-control  @error('moduloKi')  border-danger @enderror"
                id="moduloKi" aria-describedby="errorModuloKi" placeholder="{{__('adminlte::menu.modulos')}} - {{__('menu.kichwa')}} " />

            @error('moduloKi')
            <small id=" errorModuloKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="moduloEs">{{__('adminlte::menu.modulos')}} - {{__('menu.spanish')}}  </label>

            <input wire:model="moduloEs" type="text" class="form-control  @error('moduloEs')  border-danger @enderror"
                id="moduloEs" aria-describedby="errorModuloEs" placeholder="{{__('adminlte::menu.modulos')}} - {{__('menu.spanish')}} " />

            @error('moduloEs')
            <small id=" errorModuloEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>


        <div class="form-group">
            <label for="moduloEn">{{__('adminlte::menu.modulos')}} - {{__('menu.english')}}  </label>

            <input wire:model="moduloEn" type="text" class="form-control  @error('moduloEn')  border-danger @enderror"
                id="moduloEn" aria-describedby="errorModuloEn" placeholder="{{__('adminlte::menu.modulos')}} - {{__('menu.english')}} " />

            @error('moduloEn')
            <small id=" errorModuloEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <x-slot name="footerSlot">

            <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                icon="fas fa-window-close" data-dismiss="modal" />

                <div class="spinner-border" role="status" wire:loading wire:target="editarModulo">
                    <span class="sr-only">Loading...</span>
                </div>
                <x-adminlte-button wire:loading.remove wire:target="editarModulo" theme="primary" type="submit"
                    label="{{ __('messages.editar') }}" icon="fas fa-save" />
        </x-slot>


    </x-adminlte-modal>
</form>