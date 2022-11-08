<x-admin.admin>
    @push('styles')
    @vite(['resources/scss/fontawesome.scss'])
    <style>
        .hover-scale {
            transition: transform .3s ease-in;
        }

        .hover-scale:hover {
            transform: scale(1.07)
        }
    </style>
    @endpush
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>

    {{-- MUESTRA servicios --}}
    @if (Route::is('admin.agenda.index'))
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('menu.agenda'),
        'href' => route('admin.agenda.index',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('menu.agenda')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.mostrar-servicios')
    @else
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('menu.agenda'),
        'href' => route('admin.agenda.index',[],false)
        ],
        [
        'nombreRuta' =>$servicio->servicionombretrans->where('codigoTrans', '=',
        app()->getLocale())->first()->nombreTrans,
        'href' => route('admin.agenda.show',['servicio' => $servicio],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{$rutaHeader[2]['nombreRuta']}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>

    <div class="d-flex flex-wrap justify-content-center" style="gap: 1rem">
        <x-adminlte-small-box class="col-sm-5 col-lg-5 col-xl-4 hover-scale" title="{{__('messages.eventos')}}"
            text="{{$rutaHeader[2]['nombreRuta']}}" icon="fas fa-eye" theme="warning"
            url="{{route('admin.agenda.eventos.show',['servicio' => $servicio],false)}}"
            url-text="{{__('messages.ver')}}" />
        <x-adminlte-small-box class="col-sm-5 col-lg-5 col-xl-4 hover-scale" title="{{__('messages.cursos')}}"
            text="{{$rutaHeader[2]['nombreRuta']}}" icon="fas fa-eye" theme="warning"
            url="{{route('admin.agenda.cursos.show',['servicio' => $servicio],false)}}"
            url-text="{{__('messages.ver')}}" />
    </div>
    @endif


</x-admin.admin>