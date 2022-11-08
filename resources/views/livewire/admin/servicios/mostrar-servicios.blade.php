<div>
    {{-- <i class="fa-solid fa-photo-film"></i>
    <i class="fa-solid fa-piggy-bank"></i>
    <i class="fa-solid fa-handshake"></i>
    <i class="fa-solid fa-chalkboard-user"></i>
    <i class="fa-solid fa-seedling"></i> --}}
    <div wire:loading.remove>


        <div class="d-flex flex-wrap justify-content-center" style="gap: 1rem">
            @forelse ($servicios as $servicio)

            <x-adminlte-callout class="col-sm-5 col-lg-4 col-xl-3 hover-scale " theme="warning"
                title="{{$servicio->servicionombretrans->where('codigoTrans', '=', app()->getLocale())->first()->nombreTrans}}"
                title-class="text-bold text-uppercase text-center">

                {{-- {{$servicio->serviciodescripciontrans->where('codigoIdioma', '=',
                app()->getLocale())->first()->descripcionTrans}} --}}
                <div class="text-center">
                    <i class="fa-3x {{$servicio->icono}} ">
                    </i>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    {{-- {!!nl2br($miembro->descripciontrans[2]->descripcionTrans)!!} --}}
                    {{ __('messages.description') }} - {{ __('menu.services') }}
                    <x-adminlte-button class="btn-xs" icon="fas fa-edit" data-toggle="modal"
                        data-target="#modalDescripcionServicio{{$servicio->idServicio}}" />
                </div>


                <hr>
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between pt-2">
                    <x-adminlte-button class="align-self-stretch mb-2 mb-sm-0 mr-0 mr-sm-2"
                        wire:click="$emit('alertDelete', {{ $servicio->idServicio }})" type="submit" theme="danger"
                        label="{{ __('messages.delete') }}" icon="fas fa-trash" />
                    <x-adminlte-button class="align-self-stretch" theme="warning" label="  {{ __('messages.editar') }}"
                        icon="fas fa-save" data-toggle="modal"
                        data-target="#modalNombreServicio{{$servicio->idServicio}}" />
                </div>


            </x-adminlte-callout>

            @livewire('admin.servicios.editar-nombre-servicio', ['servicio' =>
            $servicio], key('modal-nombre-'.$servicio->idServicio))
            @livewire('admin.servicios.editar-descripcion-servicio', ['servicio' =>
            $servicio], key('modal-descripcion-'.$servicio->idServicio))
            @empty
            <div class="mx-auto ">
                <p>{{ __('messages.empty') }}</p>
            </div>
            @endforelse

            <x-adminlte-callout onclick="location.href='{{route('admin.servicios.create',[],false)}}';"
                class="col-sm-5 col-lg-4 col-xl-3  bg-gradient-warning d-flex flex-column justify-content-center align-items-center hover-scale"
                theme="warning" title="{{__('messages.crear')}}" title-class="text-bold text-uppercase">
                <div class="text-center">
                    <i class="fa-3x fa-solid fa-plus ">
                    </i>
                </div>
                {{__('messages.crear_nuevo')}}
            </x-adminlte-callout>


        </div>
    </div>

    <div class="row justify-content-center" wire:loading wire:loading.grid>
        <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    //eventos de alert y modal de update
            window.addEventListener('showToast', e => {
                if (e.detail.isDescription) {
                    $('#modalDescripcionServicio' + e.detail.idServicio).modal('hide')
                } else {

                    $('#modalNombreServicio' + e.detail.idServicio).modal('hide');
                }

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#29a329',
                    color: '#ffffff',
                    iconColor: '#ffffff',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: "{{ __('messages.edit_correctly') }}"
                })
            })



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
                    title: "{{ __('messages.edit_error') }}"
                })
            })

            //delete 
            // El siguiente código es el Alert utilizado
            Livewire.on('alertDelete', idServicio => {

                Swal.fire({
                    title: "{{ __('messages.delete_question') }}",
                    text: "{{ __('messages.delete_shure') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('messages.si') }}",
                    cancelButtonText: "{{ __('messages.no') }}"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emit('deleteServicio', idServicio);
                        Swal.fire(
                            "{{ __('messages.delete') }}",
                            "{{ __('messages.delete_correctly') }}",
                            'success'
                        )
                    }
                })
            });
</script>
@endpush