@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Registrar nuevo usuario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        @include('admin.users.partials.form',['button' => 'Registrar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
