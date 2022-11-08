<x-admin.admin>

    <x-slot:title>
        {{__('messages.admin') . " - " . __('messages.tinkunakuy')}}
    </x-slot:title>

    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('messages.members'),
        'href' => route('admin.institution.index',[],false)
        ]
        ]
        @endphp
        <x-admin.header title="{{__('messages.tinkunakuy')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>

    @livewire('admin.institucion.mostrar-institucion')
</x-admin.admin>