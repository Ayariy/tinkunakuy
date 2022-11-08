<x-admin.admin>
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>

    {{-- MUESTRA eventos --}}
    @if (Route::is('admin.agenda.eventos.create'))
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
        [
        'nombreRuta' => __('messages.eventos'),
        'href' => route('admin.agenda.eventos.show',['servicio' => $servicio],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.agenda.eventos.create',['servicio' => $servicio],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.eventos.crear-evento',['servicio' => $servicio])
    @else
    {{-- MUESTRA eventos --}}
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
        [
        'nombreRuta' => __('messages.eventos'),
        'href' => route('admin.agenda.eventos.show',['servicio' => $servicio],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.eventos')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.eventos.mostrar-eventos',['servicio' => $servicio])
    @endif

</x-admin.admin>