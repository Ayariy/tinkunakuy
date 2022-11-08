<x-adminlte-modal wire:ignore.self {{$attributes}} theme="primary" icon="fas fa-lg fa-briefcase" size='lg' scrollable>

    {{$slot}}
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="danger" icon="fas fa-window-close" data-dismiss="modal" />
    </x-slot>


</x-adminlte-modal>