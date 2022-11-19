<x-admin.admin>
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>

    {{-- MUESTRA Modulos --}}
    @if (Route::is('admin.agenda.modulos.create'))
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
        'nombreRuta' => __('adminlte::menu.modulos'),
        'href' => route('admin.agenda.modulos',[],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.agenda.modulos.create',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.modulos.crear-modulos')

   

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
        'nombreRuta' => __('adminlte::menu.modulos'),
        'href' => route('admin.agenda.modulos',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('adminlte::menu.modulos')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @if (session()->has('mensaje'))
    <div class="mt-3">
        <x-adminlte-alert theme="success" icon="" dismissable>
            {{session('mensaje')}}
        </x-adminlte-alert>
    </div>
    @endif
    @livewire('admin.agenda.modulos.mostrar-modulos')
    @endif


</x-admin.admin>