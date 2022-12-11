@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
<form wire:submit.prevent="editarMiembro">
    <x-adminlte-modal wire:ignore.self id="modalMiembro{{ $idMiembro }}"
        title="{{ __('messages.editar') }} {{ $name }}" theme="primary" icon="fas fa-lg fa-users" size='lg'
        scrollable>

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

        <div class="form group">
            <label for="estado">{{ __('messages.estado') }} </label>
            <select id="estado" class="custom-select col-sm-2 mb-2 mb-sm-0" wire:model="estado"
                aria-describedby="errorEstado">
                <option value="0">{{ __('messages.inactive') }}</option>
                <option value="1">{{ __('messages.active') }}</option>
            </select>

            @error('estado')
                <small id=" errorEstado" class="form-text text-muted">
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
            @else
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" src=" {{ Cloudinary::getUrl($publicId) }}">
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

        <x-slot name="footerSlot">
            <div wire:loading.remove wire:target="editarMiembro">
                <x-adminlte-button class="mr-auto" theme="danger" label="{{ __('messages.cancel') }}"
                    icon="fas fa-window-close" data-dismiss="modal" />
                <x-adminlte-button theme="primary" type="submit" label="{{ __('messages.editar') }}"
                    icon="fas fa-save" />
            </div>
            <div class="row justify-content-center" wire:loading wire:loading.grid wire:target="editarMiembro">

                <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </x-slot>


    </x-adminlte-modal>
</form>

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
