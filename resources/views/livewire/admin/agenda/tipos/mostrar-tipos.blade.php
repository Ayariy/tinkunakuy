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
        <a href="{{ route('admin.agenda.tipos.create', [], false) }}"
            class="btn btn-primary d-flex justify-content-center align-items-center d-md-table ml-auto col-sm-2">
            <i class="fas fa-plus mr-1"></i>
            {{ __('messages.crear') }}

        </a>


    </div>

    <x-adminlte-input wire:model="search" name="iSearch" label="{{ __('menu.search') }}"
        placeholder="{{ __('menu.search') }}" igroup-size="lg">
    </x-adminlte-input>


    <div class="row justify-content-center" wire:loading wire:loading.grid>
        <div class=" spinner-border text-warning" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    @if ($tipos->isEmpty())
        <div class="text-center">
            <p>{{ __('messages.empty') }}</p>
        </div>
    @else
        <div class="table-responsive" wire:loading.remove>
            <table id="tipos" class="table mt-2 sortable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#

                            <span style="cursor: pointer;" class="float-right text-sm">
                                <i class="fas fa-arrow-up text-muted"></i>
                                <i class="fas fa-arrow-down text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">{{ __('adminlte::menu.tipos') }} - {{ __('menu.kichwa') }}
                            <span style="cursor: pointer;" class="float-right text-sm">
                                <i class="fas fa-arrow-up text-muted"></i>
                                <i class="fas fa-arrow-down text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">{{ __('adminlte::menu.tipos') }} - {{ __('menu.spanish') }}
                            <span style="cursor: pointer;" class="float-right text-sm">
                                <i class="fas fa-arrow-up text-muted"></i>
                                <i class="fas fa-arrow-down text-muted"></i>
                            </span>
                        </th>
                        <th scope="col">{{ __('adminlte::menu.tipos') }} - {{ __('menu.english') }}
                            <span style="cursor: pointer;" class="float-right text-sm">
                                <i class="fas fa-arrow-up text-muted"></i>
                                <i class="fas fa-arrow-down text-muted"></i>
                            </span>
                        </th>
                        <th data-name="action" scope="col">{{ __('messages.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <th scope="row">
                                {{ $tipo->idTipoEvento }}
                            </th>
                            <td>
                                <div class="d-flex flex-column  flex-md-row justify-content-between">
                                    {{ $tipo->tipotrans->where('codigoIdioma', '=', 'ki')->first()->tipo }}

                                    <x-adminlte-button class="align-self-stretch mb-2 mb-sm-0" type="submit"
                                        theme="primary" label="{{ __('messages.editar') }}" icon="fas fa-edit"
                                        data-toggle="modal"
                                        data-target="#modalTipo{{ $tipo->tipotrans->where('codigoIdioma', '=', 'ki')->first()->idTipoTrans }}" />
                                </div>
                                @livewire('admin.agenda.tipos.editar-tipo', ['tipo' => $tipo->tipotrans->where(
                                    'codigoIdioma',
                                    '=',
                                    'ki'
                                )->first()],
                                    key('item-tipo-'.$tipo->tipotrans->where(
                                            'codigoIdioma',
                                            '=',
                                            'ki'
                                        )->first()->idTipoTrans)) 


                            </td>
                            <td>
                                <div class="d-flex flex-column  flex-md-row justify-content-between">
                                    {{ $tipo->tipotrans->where('codigoIdioma', '=', 'es')->first()->tipo }}
                                    
                                    <x-adminlte-button class="align-self-stretch mb-2 mb-sm-0" type="submit"
                                    theme="primary" label="{{ __('messages.editar') }}" icon="fas fa-edit"
                                    data-toggle="modal"
                                    data-target="#modalTipo{{ $tipo->tipotrans->where('codigoIdioma', '=', 'es')->first()->idTipoTrans }}" />
                                </div>

                                @livewire('admin.agenda.tipos.editar-tipo', ['tipo' => $tipo->tipotrans->where(
                                    'codigoIdioma',
                                    '=',
                                    'es'
                                )->first()],
                                    key('item-tipo-'.$tipo->tipotrans->where(
                                            'codigoIdioma',
                                            '=',
                                            'es'
                                        )->first()->idTipoTrans)) 
                            </td>
                            <td>
                                <div class="d-flex flex-column  flex-md-row justify-content-between">
                                    {{ $tipo->tipotrans->where('codigoIdioma', '=', 'en')->first()->tipo }}

                                    <x-adminlte-button class="align-self-stretch mb-2 mb-sm-0" type="submit"
                                    theme="primary" label="{{ __('messages.editar') }}" icon="fas fa-edit"
                                    data-toggle="modal"
                                    data-target="#modalTipo{{ $tipo->tipotrans->where('codigoIdioma', '=', 'en')->first()->idTipoTrans }}" />
                                </div>

                                @livewire('admin.agenda.tipos.editar-tipo', ['tipo' => $tipo->tipotrans->where(
                                    'codigoIdioma',
                                    '=',
                                    'en'
                                )->first()],
                                    key('item-tipo-'.$tipo->tipotrans->where(
                                            'codigoIdioma',
                                            '=',
                                            'en'
                                        )->first()->idTipoTrans)) 
                            </td>
                            <td class="d-flex flex-column flex-sm-row align-items-center justify-content-around">
                                <x-adminlte-button class="align-self-stretch"
                                    wire:click="$emit('alertDelete', {{ $tipo->idTipoEvento }})" type="submit"
                                    theme="danger" label="{{ __('messages.delete') }}" icon="fas fa-trash" />
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $tipos->links('pagination::bootstrap-5') }}

        </div>
    @endif
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
                    .forEach(tr => tbody.appendChild(tr));

                if (e.currentTarget.dataset.name !== 'action') {
                    if (!this.asc) {
                        e.currentTarget.querySelectorAll('i')[0].classList.remove('text-muted');
                        e.currentTarget.querySelectorAll('i')[1].classList.add('text-muted');

                    } else {
                        e.currentTarget.querySelectorAll('i')[0].classList.add('text-muted');
                        e.currentTarget.querySelectorAll('i')[1].classList.remove('text-muted');
                        // e.target.querySelectorAll('i')[1].classList.add('text-muted');
                    }
                }

            })));


            //eventos de alert y modal de update
            window.addEventListener('showToast', e => {
                $('#modalTipo' + e.detail.idTipo).modal('hide')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#29a329',
                    color: '#ffffff',
                    iconColor: '#ffffff',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: "{{ __('messages.edit_correctly') }}"
                })
            })


            window.addEventListener('showToastError', e => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    background: '#FA0900',
                    color: '#ffffff',
                    iconColor: '#ffffff',
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'error',
                    title: "{{ __('messages.edit_error') }}"
                })
            })

            //delete 
            // El siguiente c??digo es el Alert utilizado
            Livewire.on('alertDelete', idTipo => {

                Swal.fire({
                    title: "{{ __('messages.delete_question') }}",
                    text: "{{ __('messages.delete_shure') }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "{{ __('messages.si') }}",
                    cancelButtonText: "{{ __('messages.no') }}"
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emit('deleteTipo', idTipo);

                        Swal.fire(
                            "{{ __('messages.delete') }}",
                            "{{ __('messages.delete_correctly') }}",
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>
