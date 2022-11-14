<x-admin.admin>
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>

    {{-- MUESTRA horarios --}}
    @if (Route::is('admin.agenda.horarios.create'))
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
        'nombreRuta' => __('adminlte::menu.horarios'),
        'href' => route('admin.agenda.horarios',[],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.agenda.horarios.create',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.horarios.crear-horario')

    @elseif (Route::is('admin.agenda.horarios.edit'))

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
        'nombreRuta' => __('adminlte::menu.horarios'),
        'href' => route('admin.agenda.horarios',[],false)
        ],
        [
        'nombreRuta' => __('messages.editar'),
        'href' => route('admin.agenda.horarios.edit',['horario'=>$horario],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.editar')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.agenda.horarios.editar-horario',['horario'=>$horario])

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
        'nombreRuta' => __('adminlte::menu.horarios'),
        'href' => route('admin.agenda.horarios',[],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('adminlte::menu.horarios')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @if (session()->has('mensaje'))
    <div class="mt-3">
        <x-adminlte-alert theme="success" icon="" dismissable>
            {{session('mensaje')}}
        </x-adminlte-alert>
    </div>
    @endif
    @livewire('admin.agenda.horarios.mostrar-horarios')
    @endif

</x-admin.admin>