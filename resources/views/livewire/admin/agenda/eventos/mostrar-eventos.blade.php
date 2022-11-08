<div class="">

    <div class="row mb-1 ">
        <select class="custom-select col-sm-2 mb-2 mb-sm-0" wire:model="perPage">
            <option value="10" selected>10</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="60">60</option>
            <option value="70">70</option>
            <option value="80">80</option>
            <option value="90">90</option>
            <option value="100">100</option>
        </select>
        <a href="{{route('admin.agenda.eventos.create',['servicio'=>$servicio],false)}}"
            class="btn btn-primary d-flex justify-content-center align-items-center d-md-table ml-auto col-sm-2">
            <i class="fas fa-plus mr-1"></i>
            {{__('messages.crear')}}

        </a>


    </div>

    <x-adminlte-input wire:model="search" name="iSearch" label="{{__('menu.search')}}"
        placeholder="{{__('menu.search')}}" igroup-size="lg">
    </x-adminlte-input>


    <div class="table-responsive">
        <table id="cargos" class="table mt-2 sortable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#

                        <span data-name="id" style="cursor: pointer;" class="float-right text-sm">
                            <i class="fas fa-arrow-up text-muted"></i>
                            <i class="fas fa-arrow-down text-muted"></i>
                        </span>
                    </th>
                    <th scope="col">{{__('messages.cargo')}} - {{__('menu.kichwa')}}
                        <span data-name="ki" style="cursor: pointer;" class="float-right text-sm">
                            <i class="fas fa-arrow-up text-muted"></i>
                            <i class="fas fa-arrow-down text-muted"></i>
                        </span>
                    </th>
                    <th scope="col">{{__('messages.cargo')}} - {{__('menu.spanish')}}
                        <span style="cursor: pointer;" class="float-right text-sm">
                            <i class="fas fa-arrow-up text-muted"></i>
                            <i class="fas fa-arrow-down text-muted"></i>
                        </span>
                    </th>
                    <th scope="col">{{__('messages.cargo')}} -
                        {{__('menu.english')}}
                        <span style="cursor: pointer;" class="float-right text-sm">
                            <i class="fas fa-arrow-up text-muted"></i>
                            <i class="fas fa-arrow-down text-muted"></i>
                        </span>
                    </th>
                    <th data-name="action" scope="col">{{__('messages.action')}}</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($cargos as $cargo) --}}
                <tr {{-- wire:key="item-{{$cargo->idcargo }}" --}}>
                    <th scope="row">
                        {{-- {{$cargo->idcargo}} --}}
                    </th>
                    <td>
                        <div class="d-flex flex-column  flex-md-row justify-content-between">
                            as
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column  flex-md-row justify-content-between">
                            sa

                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column  flex-md-row justify-content-between">
                            ass

                        </div>

                    </td>
                    <td>

                    </td>
                </tr>
                {{-- @endforeach --}}

            </tbody>
        </table>
        {{-- {{$cargos->links('pagination::bootstrap-5')}} --}}

    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;
        
        const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
        )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));
        
        // do the work...
        document.querySelectorAll('th').forEach(th => th.addEventListener('click', ((e) => {
            // console.log()
            const table = th.closest('table');
            const tbody = table.querySelector('tbody');
            Array.from(tbody.querySelectorAll('tr'))
        .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        .forEach(tr => tbody.appendChild(tr) );
        
        if (e.currentTarget.dataset.name!=='action') {     
            if(!this.asc){
                e.currentTarget.querySelectorAll('i')[0].classList.remove('text-muted');
                e.currentTarget.querySelectorAll('i')[1].classList.add('text-muted');
    
            }else{
                e.currentTarget.querySelectorAll('i')[0].classList.add('text-muted');
                e.currentTarget.querySelectorAll('i')[1].classList.remove('text-muted');
                // e.target.querySelectorAll('i')[1].classList.add('text-muted');
            }
        }
        
    })));
    

    //eventos de alert y modal de update
    window.addEventListener('showToast', e => {
            $('#modalCargo'+e.detail.idCargoTrans).modal('hide')

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


        window.addEventListener('showToastError', e => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background:'#FA0900',
                color: '#ffffff',
                iconColor: '#ffffff',
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
                Toast.fire({
                icon: 'error',
                title: "{{__('messages.edit_error')}}"
                })
        })

        //delete 
// El siguiente código es el Alert utilizado
    Livewire.on('alertDelete', idcargo=>{

        Swal.fire({
        title: "{{__('messages.delete_question')}}",
        text: "{{__('messages.delete_shure')}}",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "{{__('messages.si')}}",
        cancelButtonText:  "{{__('messages.no')}}"
        }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emit('deleteCargo',idcargo);
            Swal.fire(
            "{{__('messages.delete')}}",
            "{{__('messages.delete_correctly')}}",
            'success'
            )
        }
        })
    });

    </script>
    @endpush
</div>