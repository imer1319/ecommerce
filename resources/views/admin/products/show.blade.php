@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="mx-auto text-white">Datos del producto</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>URL amigable</th>
                                <td>{{ $product->slug }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Tags</th>
                                <td>
                                    @foreach($product->tags as $tag)
                                        <span class="badge badge-primary mr-1 my-1">
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    @if($product->image)
                                        <img class="rounded border shadow-sm" src="{{ '/image/'.$product->image->url }}" height="150" width="150">
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="btn btn-primary btn-block"
                           href="{{ route('products.index') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
