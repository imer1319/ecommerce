@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Datos de la categoria</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <th>URL amigable</th>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    @if($category->image)
                                        <img class="rounded border shadow-sm" src="{{ '/image/'.$category->image->url }}" height="150" width="150">
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="btn btn-primary btn-block"
                           href="{{ route('categories.index') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
