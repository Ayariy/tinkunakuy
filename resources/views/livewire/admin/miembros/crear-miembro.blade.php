@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
<div>

    <form wire:submit.prevent="crearMiembro">
        <div class="form-group">
            <label for="name">{{ __('messages.full_name') }} </label>
            <input wire:model="name" type="text" class="form-control  @error('name')  border-danger @enderror"
                id="name" aria-describedby="errorName" placeholder="{{ __('messages.full_name') }}" />

            @error('name')
                <small id=" errorName" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('messages.email') }} </label>
            <input wire:model="email" type="email" class="form-control  @error('email')  border-danger @enderror"
                id="email" aria-describedby="errorEmail" placeholder="{{ __('messages.email') }}" />

            @error('email')
                <small id=" errorEmail" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">{{ __('messages.phone') }} </label>
            <input wire:model="phone" type="number" maxlength="10"
                class="form-control  @error('phone')  border-danger @enderror" id="phone"
                aria-describedby="errorPhone" placeholder="{{ __('messages.phone') }}" />

            @error('phone')
                <small id=" errorPhone" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="miembroKi">{{ __('messages.description') }} - {{ __('menu.kichwa') }} </label>
            <textarea wire:model="miembroKi" type=" text" class="form-control  @error('miembroKi')  border-danger @enderror"
                id="miembroKi" aria-describedby="errorMiembroKi" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('miembroKi')
                <small id=" errorMiembroKi" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="miembroEs">{{ __('messages.description') }} - {{ __('menu.spanish') }} </label>
            <textarea wire:model="miembroEs" type="text" class="form-control  @error('miembroEs')  border-danger @enderror"
                id="miembroEs" aria-describedby="errorMiembroEs" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('miembroEs')
                <small id=" errorMiembroEs" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="miembroEn">{{ __('messages.description') }} - {{ __('menu.english') }} </label>
            <textarea wire:model="miembroEn" type=" text" class="form-control  @error('miembroEn')  border-danger @enderror"
                id="miembroEn" aria-describedby="errorMiembroEn" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('miembroEn')
                <small id=" errorMiembroEn" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- With multiple slots and lg size --}}
        <x-adminlte-input wire:model="facebook" name="facebook" label="{{ __('messages.facebook') }}"
            placeholder="{{ __('messages.facebook') }}">
            <x-slot name="prependSlot">
                <a href="{{ $facebook }}" class="btn btn-primary" target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
            </x-slot>
        </x-adminlte-input>


        {{-- With multiple slots and lg size --}}
        <x-adminlte-input wire:model="instagram" name="instagram" label="{{ __('messages.instagram') }}"
            placeholder="{{ __('messages.instagram') }}">
            <x-slot name="prependSlot">
                <a href="{{ $instagram }}" class="btn text-light" target="_blank"
                    style=" background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f
                    60%,#285AEB 90%);">
                    <i class="fab fa-instagram"></i>
                </a>
            </x-slot>
        </x-adminlte-input>


        <div class="form-group">
            <label for="inputFoto">{{ __('messages.foto') }}</label>
            <div class="input-group mb-3">
                <label class="custom-file-label" for="inputFoto">
                    @if ($photo)
                        {{ $photo->getClientOriginalName() }}
                    @endif
                </label>
                <div class="custom-file">
                    <input wire:model="photo" type="file"
                        class="custom-file-input  @error('photo')  border-danger @enderror" id="inputFoto"
                        accept="image/png, image/jpg, image/jpeg">
                </div>
            </div>
            @error('photo')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
            @if ($photo)
                <div class="row">
                    <div class="col-12 col-md-6">
                        @if (substr($photo->getMimeType(), 0, 5) == 'image')
                            <img class="img-fluid" src=" {{ $photo->temporaryUrl() }}">
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <div class="form-group">
            <div wire:ignore>
                <label for="miembros">{{ __('menu.cargo') }}</label>
                <select wire:model="cargosSelect" class="border form-control selectpicker "
                    title="{{ __('menu.cargo') }}" name="miembros[]" id="miembros" multiple required>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->idcargo }}">
                            {{ $cargo->cargotrans->where('codigoIdioma', '=', app()->getLocale())->first()->cargoTrans }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('cargosSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>
        <div class="spinner-border" role="status" wire:loading wire:target="crearMiembro">
            <span class="sr-only">Loading...</span>
        </div>
        <x-adminlte-button wire:loading.remove wire:target="crearMiembro" type="submit" theme="primary"
            label="{{ __('messages.save') }}" icon="fas fa-save" />
    </form>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        window.addEventListener('showToastError', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#FA0900',
                color: '#ffffff',
                iconColor: '#ffffff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: "{{ __('messages.save_error') }}"
            })
        })
    </script>
@endpush
