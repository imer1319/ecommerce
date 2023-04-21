@extends('layouts.admin')

@section('content-admin')
    <div class="card">
        <div class="card-body">
            <h3 class="pt-2">Editar rol</h3>
            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.roles.partials.form', ['button' => 'Actualizar'])
            </form>
        </div>
    </div>
@endsection
