@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="display-6 text-center mt-2 p-0 text-uppercase ">{{__('services list')}} </h5>
                </div>
                <div class="card-body">
                    @include('partials.success')
                    <div class="col  d-flex justify-content-between  align-items-center">
                        <span>
                            @can('servicios.create')
                            <a href="{{route('servicios.create')}} " class="btn btn-primary my-2 float-left"
                                title="{{__('add register')}} "><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                {{__('new record')}} </a>@endcan
                        </span>
                        <span>
                            @can('servicios.formImportExcel')
                            <a href="{{route('servicios.formImportExcel')}}" class="btn btn-primary"><i
                                    class="fa fa-download" aria-hidden="true"></i> </a>
                            @endcan
                        </span>

                    </div>
                    <table aria-colspan="2" id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="25%" class="text-capitalize">{{__('servicio')}}</th>
                                <th width="15%" class="text-capitalize">{{__('precio')}}</th>
                                <th width="20%" class="text-capitalize">{{__('proveedor')}}</th>
                                <th width="30%" class="text-capitalize">{{__('description')}}</th>
                                <th width="10%" class="text-center text-capitalize">{{__('actions')}} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($servicios as $servicio )
                            <tr>

                                <td scope="row" class="text-capitalize">{{$servicio->name}}</td>
                                <td scope="row" class="text-capitalize text-right">
                                    {{number_format($servicio->precio, 2)}}</td>
                                <td scope="row" class="text-capitalize">{{$servicio->proveedor}}</td>
                                <td scope="row" class="text-capitalize">{{$servicio->description}} </td>
                                <td class="text-center">
                                    @can('servicios.edit')
                                    <a href="{{route('servicios.edit',$servicio->id)}}"
                                        class="btn btn-outline-success text-capitalize" data-toggle="tooltip"
                                        data-placement="top" title="{{__('edit record')}} ">

                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                    </a>
                                    @endcan
                                    @can('servicios.destroy')
                                    <a class="btn btn-outline-danger text-capitalize" href="#" onclick="event.preventDefault();
                                    document.getElementById({{$servicio->id}}).submit();" data-toggle="tooltip"
                                        data-placement="top" title="{{__('delete record')}} ">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{route('servicios.destroy',[$servicio->id])}} " method="post"
                                        id="{{$servicio->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        table = $('#example').DataTable({

            "pagingType": "full_numbers",
            "language": {
                "info": "Pag.  _PAGE_ de _PAGES_  páginas,  Total: _TOTAL_ ",
                "search": "Buscar  ",
                "paginate": {
                    "next": "Sig.",
                    "previous": "Ant.",
                    "last": "Último",
                    "first": "Primero",
                },
                "lengthMenu": "Mostrar  <select class='custom-select custom-select-sm'>" +
                    "<option value='5'>5</option>" +
                    "<option value='10'>10</option>" +
                    "<option value='15'>15</option>" +
                    "<option value='20'>20</option>" +
                    "<option value='25'>25</option>" +
                    "<option value='50'>50</option>" +
                    "<option value='100'>100</option>" +
                    "<option value='-1'>Todos</option>" +
                    "</select> Registros",
                "loadingRecord": "Cargando....",
                "processing": "Procesando...",
                "emptyTable": "No hay Registros",
                "zeroRecords": "No hay coincidencias",
                "infoEmpty": "",
                "infoFiltered": ""
            },

            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }],
        });

        $('label').addClass('form-inline');
        $('select, input[type="search"]').addClass('form-control input-sm');
        $('.dataTables_length').addClass('bs-select');
    });

</script>
@endsection
