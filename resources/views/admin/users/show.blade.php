@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Datos del usuario</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>
                                    @foreach($user->roles as $key => $roles)
                                        <span class="badge badge-info">{{ $roles->name }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="btn btn-default btn-block" href="{{ route('users.index') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
