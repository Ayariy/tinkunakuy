<x-admin.admin>
    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.agenda')}}
    </x-slot:title>
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
        'nombreRuta' => __('messages.cursos'),
        'href' => route('admin.agenda.cursos.show',['servicio' => $servicio],false)
        ],
        ]
        @endphp
        <x-admin.header title="{{__('messages.cursos')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
</x-admin.admin>