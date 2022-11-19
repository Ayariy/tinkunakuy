<div>
    <form wire:submit.prevent="crearModulo">

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




        <div class="spinner-border" role="status" wire:loading wire:target="crearModulo">
            <span class="sr-only">Loading...</span>
        </div>
        <x-adminlte-button wire:loading.remove wire:target="crearModulo" type="submit" theme="primary"
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