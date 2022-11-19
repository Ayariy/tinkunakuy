<div>
    <form wire:submit.prevent="crearTipo">

        <div class="form-group">
            <label for="tipoKi">{{__('adminlte::menu.tipos')}} - {{__('menu.kichwa')}}  </label>

            <input wire:model="tipoKi" type="text" class="form-control  @error('tipoKi')  border-danger @enderror"
                id="tipoKi" aria-describedby="errorTipoKi" placeholder="{{__('adminlte::menu.tipos')}} - {{__('menu.kichwa')}} " />

            @error('tipoKi')
            <small id=" errorTipoKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="tipoEs">{{__('adminlte::menu.tipos')}} - {{__('menu.spanish')}}  </label>

            <input wire:model="tipoEs" type="text" class="form-control  @error('tipoEs')  border-danger @enderror"
                id="tipoEs" aria-describedby="errorTipoEs" placeholder="{{__('adminlte::menu.tipos')}} - {{__('menu.spanish')}} " />

            @error('tipoEs')
            <small id=" errorTipoEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>


        <div class="form-group">
            <label for="tipoEn">{{__('adminlte::menu.tipos')}} - {{__('menu.english')}}  </label>

            <input wire:model="tipoEn" type="text" class="form-control  @error('tipoEn')  border-danger @enderror"
                id="tipoEn" aria-describedby="errorTipoEn" placeholder="{{__('adminlte::menu.tipos')}} - {{__('menu.english')}} " />

            @error('tipoEn')
            <small id=" errorTipoEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>




        <div class="spinner-border" role="status" wire:loading wire:target="crearTipo">
            <span class="sr-only">Loading...</span>
        </div>
        <x-adminlte-button wire:loading.remove wire:target="crearTipo" type="submit" theme="primary"
            label="{{__('messages.save')}}" icon="fas fa-save" />
    </form>

</div>

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