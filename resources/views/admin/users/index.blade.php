@extends('layouts.admin')

@section('content-admin')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Listado de usuarios</h5>
            @can('users_create')
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">Crear nuevo</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-table" class="table align-items-center table-flush w-100">
                    <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>&nbsp</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#user-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '{!! route('user.dataTable') !!}',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'role'},
                    {data: 'btn', "orderable": false, "searchable": false},
                ],
                "pageLength": 7,
                "lengthMenu": [7, 15, 25, 50],
                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate": {
                        "next": ">",
                        "previous": "<"
                    },
                    "lengthMenu": 'Mostrando <select class="form-control-sm">' +
                        '<option value="7">7</option>' +
                        '<option value="15">15</option>' +
                        '<option value="25">25</option>' +
                        '<option value="50">50</option>' +
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando",
                    "emptyTable": "No hay registros",
                    "zeroRecords": "Sin registros"
                },
            });
            $('div.dataTables_filter input').addClass('form-control form-control-sm');
        });
    </script>
@endsection
