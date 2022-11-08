<div class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach ($institucions as $institucion)
            @php
            $cardColor = "";
            if ($institucion->idInstitucion>=1 && $institucion->idInstitucion<=3) { $cardColor="warning" ; }elseif
                ($institucion->idInstitucion>=4 && $institucion->idInstitucion<=6) { $cardColor="dark" ; }else{
                    $cardColor="info" ; } @endphp <div class="col-lg-6">
                    <x-adminlte-card title="{{$institucion->tituloTrans}}" theme="{{$cardColor}}"
                        icon="fas fa-lg fa-university" collapsible>

                        {!!nl2br($institucion->textoTrans)!!}

                        <x-slot name="footerSlot">
                            <div class="d-md-flex align-items-center justify-content-end ">
                                <x-adminlte-button class="" theme="{{$cardColor}}" label="  {{__('messages.editar')}}"
                                    icon="fas fa-save" data-toggle="modal"
                                    data-target="#modalInstitucion{{$institucion->idInstitucion}}" />
                            </div>
                        </x-slot>
                        @livewire('admin.institucion.editar-institucion', ['institucion' => $institucion, 'modalColor'
                        =>$cardColor], key('item-'.$institucion->idInstitucion))
                    </x-adminlte-card>
        </div>
        @endforeach
    </div>
</div>
</div>
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('showToast', e => {
            $('#modalInstitucion'+e.detail.idInstitucion).modal('hide')

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
                title: "{{__('messages.edit_correctly')}}"
                })
        })



        window.addEventListener('loading', e => {
            if(e.detail.is){
                Swal.fire({
                title: "{{__('messages.loading')}}",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                },
                })
            }else{
                Swal.hideLoading();
            }
            
        })
        // Livewire.on('showToast',(institucionId)=>{
        
        // });
</script>

@endpush