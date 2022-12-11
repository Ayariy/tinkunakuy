@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush
<div>
    {{--
    NombreTrans
    DescripcionTrans
    duracionHoras
    Precio
    Lugar
    fechaInicio
    FechaFin
    foto
    idServicio o categoria
    idTipo de evento
    Modulos
    Miembros
    Horarios
    --}}
    <form wire:submit.prevent="crearEvento">
        {{-- NOMBRE EVENTO --}}
        <div class="form-group">
            <label for="nombreKi">{{ __('messages.name') }} - {{ __('menu.kichwa') }} </label>
            <input wire:model="nombreKi" type="text" class="form-control  @error('nombreKi')  border-danger @enderror"
                id="nombreKi" aria-describedby="errorNombreKi"
                placeholder="{{ __('messages.name') }} - {{ __('menu.agenda') }}" />

            @error('nombreKi')
                <small id="errorNombreKi" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombreEs">{{ __('messages.name') }} - {{ __('menu.spanish') }} </label>
            <input wire:model="nombreEs" type="text"
                class="form-control  @error('nombreEs')  border-danger @enderror" id="nombreEs"
                aria-describedby="errorNombreEs" placeholder="{{ __('messages.name') }} - {{ __('menu.agenda') }}" />

            @error('nombreEs')
                <small id="errorNombreEs" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>


        <div class="form-group">
            <label for="nombreEn">{{ __('messages.name') }} - {{ __('menu.english') }} </label>
            <input wire:model="nombreEn" type="text"
                class="form-control  @error('nombreEn')  border-danger @enderror" id="nombreEn"
                aria-describedby="errorNombreEn" placeholder="{{ __('messages.name') }} - {{ __('menu.agenda') }}" />

            @error('nombreEn')
                <small id="errorNombreEn" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>



        {{-- DESCIPCION EVENTO --}}
        <div class="form-group">
            <label for="descripcionKi">{{ __('messages.description') }} - {{ __('menu.kichwa') }} </label>
            <textarea wire:model="descripcionKi" type=" text"
                class="form-control  @error('descripcionKi')  border-danger @enderror" id="descripcionKi"
                aria-describedby="errorDescripcionKi" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('descripcionKi')
                <small id=" errorDescripcionKi" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcionEs">{{ __('messages.description') }} - {{ __('menu.spanish') }} </label>
            <textarea wire:model="descripcionEs" type="text"
                class="form-control  @error('descripcionEs')  border-danger @enderror" id="descripcionEs"
                aria-describedby="errorDescripcionEs" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('descripcionEs')
                <small id=" errorDescripcionEs" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcionEn">{{ __('messages.description') }} - {{ __('menu.english') }} </label>
            <textarea wire:model="descripcionEn" type=" text"
                class="form-control  @error('descripcionEn')  border-danger @enderror" id="descripcionEn"
                aria-describedby="errorDescripcionEn" placeholder="{{ __('messages.members') }}" rows="3">
                </textarea>

            @error('descripcionEn')
                <small id=" errorDescripcionEn" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- HORAS --}}

        <div class="form-group">
            <label for="horas">{{ __('messages.time') }} </label>
            <input wire:model="horas" type="number" pattern="/^-?\d+\.?\d*$/"
                onKeyPress="if(this.value.length==4) return false;"
                class="form-control  @error('horas')  border-danger @enderror" id="horas"
                aria-describedby="errorHoras" placeholder="{{ __('messages.time') }}" />

            @error('horas')
                <small id="errorHoras" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>


        {{-- PRECIO --}}

        <x-adminlte-input wire:model="precio" placeholder="{{ __('messages.precio') }}" type="number" step="any"
            pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;" name="precio"
            label="{{ __('messages.precio') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hand-holding-usd"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        {{-- LUGAR --}}
        <div class="form-group">
            <label for="lugar">{{ __('messages.lugar') }} </label>
            <input wire:model="lugar" type="text" class="form-control  @error('lugar')  border-danger @enderror"
                id="lugar" aria-describedby="errorLugar" placeholder="{{ __('messages.lugar') }}" />

            @error('lugar')
                <small id="errorLugar" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- FECHAS  --}}
        <div class="form-group">
            <label for="fechaInit">{{ __('messages.finit') }} </label>
            <input wire:model="fechaInit" type="datetime-local"
                class="form-control  @error('fechaInit')  border-danger @enderror" id="fechaInit"
                aria-describedby="errorfechaInit" placeholder="{{ __('messages.finit') }}" />

            @error('fechaInit')
                <small id="errorfechaInit" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="form-group">
            <label for="fechaFin">{{ __('messages.ffin') }} </label>
            <input wire:model="fechaFin" type="datetime-local"
                class="form-control  @error('fechaFin')  border-danger @enderror" id="fechaFin"
                aria-describedby="errorfechaFin" placeholder="{{ __('messages.ffin') }}" />

            @error('fechaFin')
                <small id="errorfechaFin" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- FOTOS --}}
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

        {{-- SERVICIOS O CATEGORIA --}}
        <div class="form-group">
            <div wire:ignore>
                <label for="serviciosSelect">{{ __('menu.services') }}</label>
                <select wire:model="serviciosSelect" class="border form-control selectpicker"
                    title="{{ __('menu.services') }}" id="serviciosSelect" required>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->idServicio }}" wire:key="servicio-{{ $servicio->idServicio }}">
                            {{ $servicio->servicionombretrans()->where('codigoTrans', '=', app()->getLocale())->first()->nombreTrans }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('serviciosSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- TIPOS --}}
        <div class="form-group">
            <div wire:ignore>
                <label for="tiposSelect">{{ __('messages.tipo') }}</label>
                <select wire:model="tiposSelect" class="border form-control selectpicker"
                    title="{{ __('messages.tipo') }}" id="tiposSelect" required>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->idTipoEvento }}" wire:key="tipo-{{ $tipo->idTipoEvento }}">
                            {{ $tipo->tipotrans()->where('codigoIdioma', '=', app()->getLocale())->first()->tipo }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('tiposSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>


        {{-- MODULOS --}}
        <div class="form-group">
            <div wire:ignore>
                <label for="modulos">{{ __('adminlte::menu.modulos') }}</label>
                <select wire:model="modulosSelect" class="border form-control selectpicker "
                    title="{{ __('adminlte::menu.modulos') }}" name="modulos[]" id="modulos" multiple required>

                    @foreach ($modulos as $modulo)
                        <option value="{{ $modulo->idModulo }}">
                            {{ $this->changeModulo($modulo->modulo); }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('modulosSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        {{-- MIEMBROS --}}
        <div class="form-group">
            <div wire:ignore>
                <label for="miembros">{{ __('menu.members') }}</label>
                <select wire:model="miembrosSelect" class="border form-control selectpicker "
                    title="{{ __('menu.members') }}" name="miembros[]" id="miembros" multiple required>

                    @foreach ($miembros as $miembro)
                        <option value="{{ $miembro->idMiembro }}">
                            {{ $miembro->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('miembrosSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>


         {{-- HORARIO --}}
         <div class="form-group">
            <div wire:ignore>
                <label for="horarios">{{ __('adminlte::menu.horarios') }}</label>
                <select wire:model="horariosSelect" class="border form-control selectpicker "
                    title="{{ __('adminlte::menu.horarios') }}" name="horarios[]" id="horarios" multiple required>

                    @foreach ($horarios as $horario)
                        <option value="{{$horario->idHorario }}">
                            {{ $this->replaceArrayDay($horario->horario); }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('horariosSelect')
                <small class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{ $message }}
                    </x-adminlte-alert>
                </small>
            @enderror
        </div>

        <div class="spinner-border" role="status" wire:loading wire:target="crearEvento">
            <span class="sr-only">Loading...</span>
        </div>
        <x-adminlte-button wire:loading.remove wire:target="crearEvento" type="submit" theme="primary"
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
