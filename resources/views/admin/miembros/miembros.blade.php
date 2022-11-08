<x-admin.admin>

    <x-slot:title>
        {{__('messages.admin') . " - " . __('messages.members')}}
    </x-slot:title>


    @if (Route::is('admin.miembros.create'))
    {{-- MUESTRA EL CREAR MIEMBRO --}}
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('messages.members'),
        'href' => route('admin.miembros.index',[],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.miembros.create',[],false)
        ]
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.miembros.crear-miembro')

    @else

    {{-- MUESTRA LOS CARGOS --}}
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('messages.members'),
        'href' => route('admin.miembros.index',[],false)
        ]
        ]
        @endphp
        <x-admin.header title="{{__('messages.members')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @if (session()->has('mensaje'))
    <div class="mt-3">
        <x-adminlte-alert theme="success" icon="" dismissable>
            {{session('mensaje')}}
        </x-adminlte-alert>
    </div>
    @endif
    @livewire('admin.miembros.mostrar-miembros')
    @endif



</x-admin.admin>

@push('scripts')
<script>
    window.addEventListener('showToast', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background:'#29a329',
                color: '#ffffff',
                iconColor: '#ffffff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'success',
                title: "{{__('messages.save_correctly')}}"
                })
        })


</script>
@endpush