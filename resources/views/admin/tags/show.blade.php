@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Datos de la etiqueta</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $tag->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $tag->name }}</td>
                            </tr>
                            <tr>
                                <th>URL amigable</th>
                                <td>{{ $tag->slug }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="btn btn-primary btn-block"
                           href="{{ route('tags.index') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
