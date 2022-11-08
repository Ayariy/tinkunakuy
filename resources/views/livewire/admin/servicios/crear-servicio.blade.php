<div>
    <form wire:submit.prevent="crearServicio">

        {{-- <div class="form-group">
            <label for="icon">{{__('messages.name')}} - {{__('messages.icon')}} </label>
            <input wire:model="icon" type=" text" class="form-control  @error('icon')  border-danger @enderror"
                id="icon" aria-describedby="errorIcon"
                placeholder="{{__('messages.name')}} - {{__('messages.icon')}} " />
            <small id=" errorIcon" class="form-text text-muted">
                {{__('messages.icon')}}: <a href="https://fontawesome.com/icons"
                    target="_blank">https://fontawesome.com/icons</a>
            </small>

            @error('icon')
            <small id=" errorIcon" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div> --}}

        {{-- With multiple slots and lg size --}}
        <x-adminlte-input wire:model="icon" name="icon" label="{{__('messages.name')}} - {{__('messages.icon')}} "
            placeholder="{{__('messages.name')}} - {{__('messages.icon')}} ">
            <x-slot name="appendSlot">
                <div class="input-group-text bg-dark">
                    <i class="{{$icon}}"></i>
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

        <div class="form-group">
            <label for="descripcionKi">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.kichwa')}})
            </label>
            <textarea wire:model="descripcionKi" type="text"
                class="form-control  @error('descripcionKi')  border-danger @enderror" id="descripcionKi"
                aria-describedby="errorDescripcionKi"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.kichwa')}}) "
                rows="3">
                </textarea>

            @error('descripcionKi')
            <small id=" errorDescripcionKi" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcionEs">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.spanish')}})
            </label>
            <textarea wire:model="descripcionEs" type="text"
                class="form-control  @error('descripcionEs')  border-danger @enderror" id="descripcionEs"
                aria-describedby="errorDescripcionEs"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.spanish')}}) "
                rows="3">
                </textarea>

            @error('descripcionEs')
            <small id=" errorDescripcionEs" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>


        <div class="form-group">
            <label for="descripcionEn">{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.english')}})
            </label>
            <textarea wire:model="descripcionEn" type="text"
                class="form-control  @error('descripcionEn')  border-danger @enderror" id="descripcionEn"
                aria-describedby="errorDescripcionEn"
                placeholder="{{__('messages.description')}} - {{__('menu.services')}} ({{__('menu.english')}}) "
                rows="3">
                </textarea>

            @error('descripcionEn')
            <small id=" errorDescripcionEn" class="form-text text-muted">
                <x-adminlte-alert theme="danger" icon="" dismissable>
                    {{$message}}
                </x-adminlte-alert>
            </small>
            @enderror
        </div>

        <div class="spinner-border" role="status" wire:loading wire:target="crearServicio">
            <span class="sr-only">Loading...</span>
        </div>
        <x-adminlte-button wire:loading.remove wire:target="crearServicio" type="submit" theme="primary"
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