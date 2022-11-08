<x-admin.admin>
    @push('styles')
    @vite(['resources/scss/fontawesome.scss'])
    <style>
        .hover-scale {
            transition: transform .3s ease-in;
            cursor: pointer;
        }

        .hover-scale:hover {
            transform: scale(1.07)
        }
    </style>
    @endpush


    <x-slot:title>
        {{__('messages.admin') . " - " . __('menu.services')}}
    </x-slot:title>



    @if (Route::is('admin.servicios.create'))
    {{-- MUESTRA EL CREAR CARGO --}}
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('menu.services'),
        'href' => route('admin.servicios.index',[],false)
        ],
        [
        'nombreRuta' => __('messages.crear'),
        'href' => route('admin.servicios.create',[],false)
        ]
        ]
        @endphp
        <x-admin.header title="{{__('messages.crear')}}" :rutaHeader="$rutaHeader" />
    </x-slot:contenido_header>
    @livewire('admin.servicios.crear-servicio')

    @else

    {{-- MUESTRA LOS SERVICIOS --}}
    <x-slot:contenido_header>
        @php
        $rutaHeader = [
        [
        'nombreRuta' => __('messages.admin'),
        'href' => route('admin.index',[],false)
        ],
        [
        'nombreRuta' => __('menu.services'),
        'href' => route('admin.servicios.index',[],false)
        ]
        ]
        @endphp

        <x-admin.header title="{{__('menu.services')}}" :rutaHeader="$rutaHeader" />

    </x-slot:contenido_header>
    @if (session()->has('mensaje'))
    <div class="mt-3">
        <x-adminlte-alert theme="success" icon="" dismissable>
            {{session('mensaje')}}
        </x-adminlte-alert>
    </div>
    @endif

    @livewire('admin.servicios.mostrar-servicios')
    @endif



</x-admin.admin>

{{-- @push('scripts')
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
@endpush --}}