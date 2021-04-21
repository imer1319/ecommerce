@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Editar nueva etiqueta</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('tags.update',$tag->slug) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('admin.tags.partials.form',['button' => 'Actualizar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
