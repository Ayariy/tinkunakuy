<form wire:submit.prevent="editarNombreServicio">

    <x-adminlte-modal wire:ignore.self id="modalNombreServicio{{$idServicio}}"
        title="{{__('messages.editar')}} {{__('menu.services')}}" theme="primary" icon=" {{$icono}} fa-lg" size='lg'
        scrollable>

        <x-adminlte-input wire:model="icono" name="icon" label="{{__('messages.name')}} - {{__('messages.icon')}} "
            placeholder="{{__('messages.name')}} - {{__('messages.icon')}} ">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="{{$icono}}"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <small class="form-text text-muted">
            {{__('messages.icon')}}: <a href="https://fontawesome.com/icons"
                target="_blank">https://fontawesome.com/icons</a>
        </small>

        <div class="form-group">
            <label for="nombreKi">{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.kichwa')}}) </label>
            <input wire:model="nombreKi" type=" text" class="form-control  @error('nombreKi')  border-danger @enderror"
                id="nombreKi" aria-describedby="arrorNombreKi"
                placeholder="{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.kichwa')}})" />

            @error('nombreKi')
            <small id=" arrorNombreKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombreEs">{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.spanish')}}) </label>
            <input wire:model="nombreEs" type=" text" class="form-control  @error('nombreEs')  border-danger @enderror"
                id="nombreEs" aria-describedby="arrorNombreEs"
                placeholder="{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.spanish')}})" />

            @error('nombreEs')
            <small id=" arrorNombreEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombreEn">{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.english')}}) </label>
            <input wire:model="nombreEn" type=" text" class="form-control  @error('nombreEn')  border-danger @enderror"
                id="nombreEn" aria-describedby="arrorNombreEn"
                placeholder="{{__('messages.name')}} - {{__('menu.services')}} ({{__('menu.english')}})" />

            @error('nombreEn')
            <small id=" arrorNombreEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>


        <x-slot name="footerSlot">
            <div wire:loading.remove wire:target="editarNombreServicio">
                <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                    icon="fas fa-window-close" data-dismiss="modal" />
                <x-adminlte-button theme="primary" type="submit" label="{{__('messages.editar')}}" icon="fas fa-save" />
            </div>
            <div class="row justify-content-center" wire:loading wire:loading.grid wire:target="editarNombreServicio">

                <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </x-slot>



    </x-adminlte-modal>
</form>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('showToastError', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background:'#FA0900',
                color: '#ffffff',
                iconColor: '#ffffff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
                Toast.fire({
                icon: 'error',
                title: "{{__('messages.save_error')}}"
                })
        })


</script>
@endpush