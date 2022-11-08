<div>
    <form wire:submit.prevent="crearCargo">
        <div class="form-group">
            <label for="cargoKi">{{__('messages.cargo')}} - {{__('menu.kichwa')}} </label>
            <input wire:model="cargoTransKi" type=" text"
                class="form-control  @error('cargoTransKi')  border-danger @enderror" id="cargoKi"
                aria-describedby="errorCargoKi" placeholder="{{__('messages.cargo_placeholder')}}" />

            @error('cargoTransKi')
            <small id=" errorCargoKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="cargoEs">{{__('messages.cargo')}} - {{__('menu.spanish')}} </label>
            <input wire:model="cargoTransEs" type=" text"
                class="form-control  @error('cargoTransEs')  border-danger @enderror" id="cargoEs"
                aria-describedby="errorCargoEs" placeholder="{{__('messages.cargo_placeholder')}}" />

            @error('cargoTransEs')
            <small id=" errorCargoEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="cargoEn">{{__('messages.cargo')}} - {{__('menu.english')}} </label>
            <input wire:model="cargoTransEn" type=" text"
                class="form-control  @error('cargoTransEn')  border-danger @enderror" id="cargoEn"
                aria-describedby="errorCargoEn" placeholder="{{__('messages.cargo_placeholder')}}" />

            @error('cargoTransEn')
            <small id=" errorCargoEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <x-adminlte-button type="submit" theme="primary" label="{{__('messages.save')}}" icon="fas fa-save" />
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