<x-admin.admin>
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>

    {{-- MUESTRA Modulos --}}
    @if (Route::is('admin.agenda.tipos.create'))
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
        'nombreRuta' => __('adminlte::menu.tipos'),
        'href' => route('admin.agenda.tipos',[],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.agenda.tipos.create',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.tipos.crear-tipo')


    @else
    {{-- MUESTRA tipos --}}
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
        'nombreRuta' => __('adminlte::menu.tipos'),
        'href' => route('admin.agenda.tipos',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('adminlte::menu.tipos')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @if (session()->has('mensaje'))
    <div class="mt-3">
        <x-adminlte-alert theme="success" icon="" dismissable>
            {{session('mensaje')}}
        </x-adminlte-alert>
    </div>
    @endif
    @livewire('admin.agenda.tipos.mostrar-tipos')
    @endif


</x-admin.admin>