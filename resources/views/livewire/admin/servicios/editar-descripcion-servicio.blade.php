<form wire:submit.prevent="editarDescripcionServicio">

    <x-adminlte-modal wire:ignore.self id="modalDescripcionServicio{{$idServicio}}"
        title="{{__('messages.editar')}} {{__('menu.services')}}" theme="primary" icon="fas fa-edit fa-lg" size='lg'
        scrollable>

        <div class="form-group">
            <label for="descripcionKi">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.kichwa')}})
            </label>
            <textarea wire:model="descripcionKi" type=" text"
                class="form-control  @error('descripcionKi')  border-danger @enderror" id="descripcionKi"
                aria-describedby="arrorDescripcionKi"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.kichwa')}})" rows="3">
            </textarea>
            @error('descripcionKi')
            <small id=" arrorDescripcionKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcionEs">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.spanish')}})
            </label>
            <textarea wire:model="descripcionEs" type=" text"
                class="form-control  @error('descripcionEs')  border-danger @enderror" id="descripcionEs"
                aria-describedby="arrorDescripcionEs"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.spanish')}})"
                rows="3">
            </textarea>
            @error('descripcionEs')
            <small id=" arrorDescripcionEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcionEn">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.english')}})
            </label>
            <textarea wire:model="descripcionEn" type=" text"
                class="form-control  @error('descripcionEn')  border-danger @enderror" id="descripcionEn"
                aria-describedby="arrorDescripcionEn"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.english')}})"
                rows="3">
            </textarea>

            @error('descripcionEn')
            <small id=" arrorDescripcionEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>


        <x-slot name="footerSlot">
            <div wire:loading.remove wire:target="editarDescripcionServicio">
                <x-adminlte-button class="mr-auto" theme="danger" label="{{__('messages.cancel')}}"
                    icon="fas fa-window-close" data-dismiss="modal" />
                <x-adminlte-button theme="primary" type="submit" label="{{__('messages.editar')}}" icon="fas fa-save" />
            </div>
            <div class="row justify-content-center" wire:loading wire:loading.grid
                wire:target="editarDescripcionServicio">

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