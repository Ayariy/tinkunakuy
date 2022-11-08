<x-adminlte-modal wire:ignore.self id="modalHorario{{$idHorario}}" title="{{__('messages.editar')}}" theme="primary"
    icon="fas fa-clock fa-lg " size='lg' scrollable>
    <div wire:ignore.self id="modalHorario{{$idHorario}}">


        <form wire:submit.prevent="agregarDia">

            <div class="row">


                <div class="form-group col-12 col-sm-4">
                    <label for="day">{{__('messages.day')}} </label>
                    <select class="custom-select @error('day')  border-danger @enderror" wire:model="day" id="day"
                        aria-describedby="errorDay">
                        <option value="1" selected>
                            {{$this->getNameDay(1)}}
                        </option>
                        <option value="2">
                            {{$this->getNameDay(2)}}
                        </option>
                        <option value="3">
                            {{$this->getNameDay(3)}}
                        </option>
                        <option value="4">
                            {{$this->getNameDay(4)}}
                        </option>
                        <option value="5">
                            {{$this->getNameDay(5)}}
                        </option>
                        <option value="6">
                            {{$this->getNameDay(6)}}
                        </option>
                        <option value="0">
                            {{$this->getNameDay(0)}}
                        </option>
                    </select>

                    @error('day')
                    <small id="errorDay" class="form-text text-muted">
                        <x-adminlte-alert theme="danger" icon="" dismissable>
                            {{$message}}
                        </x-adminlte-alert>
                    </small>
                    @enderror
                </div>

                <div class="form-group col-12 col-sm-4">
                    <label for="timeInit">{{__('messages.time_init')}} </label>
                    <input type="time" wire:model='timeInit'
                        class="form-control @error('timeInit')  border-danger @enderror" id="timeInit"
                        aria-describedby="errorTimeInit" />

                    @error('timeInit')
                    <small id=" errorTimeInit" class="form-text text-muted">
                        <x-adminlte-alert theme="danger" icon="" dismissable>
                            {{$message}}
                        </x-adminlte-alert>
                    </small>
                    @enderror
                </div>

                <div class="form-group col-12 col-sm-4">
                    <label for="timeFin">{{__('messages.time_fin')}} </label>
                    <input type="time" wire:model='timeFin'
                        class="form-control @error('timeFin')  border-danger @enderror" id="timeFin"
                        aria-describedby="errorTimeFin" />

                    @error('timeFin')
                    <small id=" errorTimeFin" class="form-text text-muted">
                        <x-adminlte-alert theme="danger" icon="" dismissable>
                            {{$message}}
                        </x-adminlte-alert>
                    </small>
                    @enderror
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-end   ">

                <div class="spinner-border" role="status" wire:loading wire:target="agregarDia">
                    <span class="sr-only">Loading...</span>
                </div>
                <x-adminlte-button class="align-self-stretch" wire:loading.remove wire:target="agregarDia" type="submit"
                    theme="primary" label="{{__('messages.add')}}" icon="fas fa-calendar-day" />
            </div>

        </form>
        <form wire:submit.prevent="editarHorario">

            <div class="form-group">
                <label for="horario">{{__('adminlte::menu.horarios')}} </label>
                <ul class="list-group mb-3">
                    @foreach ($horarioArray as $day)
                    <li wire:key="day-{{$loop->index}}" class="list-group-item d-flex justify-content-between">
                        {{$this->replaceArrayDay($day)}}
                        <x-adminlte-button wire:key="dayDelete-{{$loop->index}}" class="btn-xs" icon="fas fa-trash"
                            theme="danger" wire:click="$emit('removerDia','{{$loop->index}}')" />
                    </li>
                    @endforeach
                </ul>

                <input wire:model="horario" type="text" class="form-control  @error('horario')  border-danger @enderror"
                    id="horario" aria-describedby="errorHorario" placeholder="{{__('adminlte::menu.horarios')}}"
                    disabled />

                @error('horario')
                <small id=" errorHorario" class="form-text text-muted">
                    <x-adminlte-alert theme="danger" icon="" dismissable>
                        {{$message}}
                    </x-adminlte-alert>
                </small>
                @enderror
            </div>

            <div class="spinner-border" role="status" wire:loading wire:target="crearHorario">
                <span class="sr-only">Loading...</span>
            </div>
            <x-adminlte-button wire:loading.remove wire:target="crearHorario" type="submit" theme="primary"
                label="{{__('messages.save')}}" icon="fas fa-save" />
        </form>

    </div>

</x-adminlte-modal>