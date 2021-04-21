@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Datos del rol</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th>Permisos</th>
                                <td>
                                    @foreach($role->permissions as $key => $permissions)
                                        <span class="badge badge-primary">{{ $permissions->name }}</span>
                                        @if($loop->index % 4 == 0)
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="btn btn-primary btn-block" href="{{ route('roles.index') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
