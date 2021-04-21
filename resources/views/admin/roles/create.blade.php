@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Registrar nuevo rol</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf

                        @include('admin.roles.partials.form',['button' => 'Registrar'])

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
