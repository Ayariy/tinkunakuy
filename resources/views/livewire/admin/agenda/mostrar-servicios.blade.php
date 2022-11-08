<div>
    <div wire:loading.remove>


        <div class="d-flex flex-wrap justify-content-center" style="gap: 1rem">
            @forelse ($servicios as $servicio)

            <x-adminlte-small-box class="col-sm-5 col-lg-4 col-xl-3 hover-scale" title="10"
                text="{{$servicio->servicionombretrans->where('codigoTrans', '=', app()->getLocale())->first()->nombreTrans}}"
                icon="{{$servicio->icono}}" theme="warning"
                url="{{route('admin.agenda.show',['servicio' => $servicio],false)}}"
                url-text="{{__('messages.ver')}}" />
            @empty
            <div class="mx-auto ">
                <p>{{ __('messages.empty') }}</p>
            </div>
            @endforelse

            <x-adminlte-callout onclick="location.href='{{route('admin.servicios.create',[],false)}}';"
                class="col-sm-5 col-lg-4 col-xl-3  bg-gradient-dark  d-flex flex-column justify-content-center align-items-center hover-scale"
                theme="warning" title="{{__('messages.crear')}}" title-class="text-bold text-uppercase">
                <div class="text-center">
                    <i class="fa-3x fa-solid fa-plus ">
                    </i>
                </div>
                {{__('messages.crear_nuevo')}}
            </x-adminlte-callout>


        </div>
    </div>

    <div class="row justify-content-center" wire:loading wire:loading.grid>
        <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>