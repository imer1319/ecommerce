@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Registrar nuevo categoria</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update',$category->slug) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @include('admin.categories.partials.form',['button' => 'Actualizar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
