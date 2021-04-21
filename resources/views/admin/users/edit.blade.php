@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Actualizar datos de usuario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', [$user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @include('admin.users.partials.form',['button' => 'Actualizar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
