<div class="scroll">
    <div class="d-sm-flex justify-content-between align-items-center ">
        <x-adminlte-input class=" " wire:model="search" name="iSearch" label="{{ __('menu.search') }}"
            placeholder="{{ __('menu.search') }}" igroup-size="lg">
        </x-adminlte-input>
        <div class="">

            <a href="{{ route('admin.miembros.create', [], false) }}"
                class="btn btn-primary d-flex justify-content-center align-items-center d-md-table ml-auto">
                <i class="fas fa-plus mr-1"></i>
                {{ __('messages.crear') }}

            </a>
        </div>


    </div>


    <div class="row justify-content-center" wire:loading wire:loading.grid wire:target='search'>
        <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <p class="text-muted">{{trans_choice('messages.count_register',$totalMiembros,['count'=>$totalMiembros])}}</p>
    <div class="row" wire:loading.remove wire:target='search'>
        @forelse ($miembros as $miembro)
        <div class="col-md-6 col-lg-4 ">
            <x-adminlte-card title="{{ $miembro->nombre }}" theme="warning" icon="fas fa-lg fa-users" collapsible>
                <img class="card-img-top rounded" style="object-fit: cover;" height="225" src="@if ($miembro->foto) {{ str_replace('%20', '', Cloudinary::getImageTag($miembro->foto)->format(' auto')->srcset) }}
                {{-- {{Cloudinary::getUrl($miembro->foto)}} --}}
                @else
                {{ asset('assets/unknow.jpg') }} @endif" alt="Foto {{ $miembro->nombre }}">

                <div class="card-body">

                    <p class="d-flex justify-content-center align-items-center">
                        @foreach ($miembro->cargos as $cargo)
                        <i class="fas fa-lg fa-briefcase mr-1"></i>
                        {{ $cargo->cargotrans->where('codigoIdioma', '=', app()->getLocale())->first()->cargoTrans }}
                        @if (!$loop->last)
                        &nbsp;-&nbsp;&nbsp;
                        @endif
                        @endforeach
                    </p>
                    <div class="d-flex justify-content-between">
                        <p class="card-text">
                            @if ($miembro->estado)
                            <i class="fas fa-lg  fa-user mr-1"></i> {{ __('messages.active') }}
                            @else
                            <i class="fas fa-lg fa-user-slash mr-1"></i> {{ __('messages.inactive') }}
                            @endif
                        </p>
                        <p class="card-text">
                            <i class="fas fa-lg fa-phone"></i>
                            {{ $miembro->telefono }}
                        </p>
                    </div>
                    <p class="card-text">
                        <i class="fas fa-lg fa-envelope"></i>
                        {{ $miembro->correo }}
                    </p>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-light">


                            <h5 class="card-text d-flex justify-content-center ">
                                <a href="{{ $miembro->facebook }}" target="_blank" rel="{{ $miembro->nombre }}">
                                    <i class="fab fa-lg fa-facebook-square  text-muted "></i>
                                </a>
                                <a href="{{ $miembro->instagram }}" class="ml-2" target="_blank"
                                    rel="{{ $miembro->instagram }}">
                                    <i class="fab fa-lg fa-instagram-square text-muted ">
                                    </i>
                                </a>
                            </h5>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            {{-- {!!nl2br($miembro->descripciontrans[0]->descripcionTrans)!!} --}}
                            {{ __('messages.description') }} - {{ __('menu.kichwa') }}

                            <x-adminlte-button class="btn-xs" icon="fas fa-edit" data-toggle="modal"
                                data-target="#modalMiembroDescripcion{{ $miembro->descripciontrans[0]->idMiemDes }}" />
                        </li>
                        @livewire('admin.miembros.editar-descripcion-miembro', ['miembroDescripcionTrans' =>
                        $miembro->descripciontrans[0],'idioma'=> __('menu.kichwa')], key('modal-' .
                        $miembro->descripciontrans[0]->idMiemDes))
                        <li class="list-group-item d-flex justify-content-between">
                            {{-- {!!nl2br($miembro->descripciontrans[1]->descripcionTrans)!!} --}}
                            {{ __('messages.description') }} - {{ __('menu.spanish') }}
                            <x-adminlte-button class="btn-xs" icon="fas fa-edit" data-toggle="modal"
                                data-target="#modalMiembroDescripcion{{ $miembro->descripciontrans[1]->idMiemDes }}" />
                        </li>

                        @livewire('admin.miembros.editar-descripcion-miembro', ['miembroDescripcionTrans' =>
                        $miembro->descripciontrans[1],'idioma'=> __('menu.spanish')], key('modal-' .
                        $miembro->descripciontrans[1]->idMiemDes))
                        <li class="list-group-item d-flex justify-content-between">
                            {{-- {!!nl2br($miembro->descripciontrans[2]->descripcionTrans)!!} --}}
                            {{ __('messages.description') }} - {{ __('menu.english') }}
                            <x-adminlte-button class="btn-xs" icon="fas fa-edit" data-toggle="modal"
                                data-target="#modalMiembroDescripcion{{ $miembro->descripciontrans[2]->idMiemDes }}" />
                        </li>
                        @livewire('admin.miembros.editar-descripcion-miembro', ['miembroDescripcionTrans' =>
                        $miembro->descripciontrans[2],'idioma'=> __('menu.english')], key('modal-' .
                        $miembro->descripciontrans[2]->idMiemDes))
                    </ul>

                    <div class="card-footer">

                        <small class="text-muted">

                            <i class="fas fa-lg fa-calendar-day"></i>
                            {{ __('messages.creado') }}
                            {{
                            Carbon\Carbon::parse($miembro->fechaRegistro)->locale(app()->getLocale())->diffForHumans()
                            }}
                        </small>
                    </div>

                    <x-slot name="footerSlot">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between ">
                            <x-adminlte-button class="align-self-stretch mb-2 mb-sm-0"
                                wire:click="$emit('alertDelete', {{ $miembro->idMiembro }})" type="submit"
                                theme="danger" label="{{ __('messages.delete') }}" icon="fas fa-trash" />
                            <x-adminlte-button class="align-self-stretch" theme="warning"
                                label="  {{ __('messages.editar') }}" icon="fas fa-save" data-toggle="modal"
                                data-target="#modalMiembro{{ $miembro->idMiembro }}" />
                        </div>
                    </x-slot>
                </div>
                @livewire('admin.miembros.editar-miembro', ['miembro' => $miembro], key('item-' . $miembro->idMiembro))
            </x-adminlte-card>
        </div>

        @empty
        <div class="mx-auto ">

            <p>{{ __('messages.empty') }}</p>
        </div>
        @endforelse

        {{-- {{$miembros->links('pagination::bootstrap-5')}} --}}
    </div>
    @if ($hasMorePages)
    <div class="row justify-content-center" wire:loading.remove>
        <button class="btn btn-primary " wire:click.prevent="loadMore">
            {{ __('messages.load_more') }}
        </button>
    </div>
    @endif

    <div class="row justify-content-center" wire:loading wire:target='loadMore' wire:loading.grid>
        <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
        // INFINITE SCROLL
        // Livewire.on('loadMoreJS',()=>{
        //     @this.loadMore();
        // })
        // window.onscroll = function(ev) {
        //         if ((window.innerHeight + window.scrollY +1) >=  document.body.offsetHeight) {
        //             Livewire.emit('loadMoreJS');
        //             // console.log('final')
        //         }
        //     };


            //eventos de alert y modal de update
            window.addEventListener('showToast', e => {
                if (e.detail.isDescription) {
                    $('#modalMiembroDescripcion' + e.detail.idMiembro).modal('hide')
                } else {

                    $('#modalMiembro' + e.detail.idMiembro).modal('hide');
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
            Livewire.on('alertDelete', idMiembro => {

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

                        Livewire.emit('deleteMiembro', idMiembro);
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
</div>