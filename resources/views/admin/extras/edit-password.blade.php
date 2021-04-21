@extends('layouts.admin')

@section('content-admin')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Mis datos
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("password.updateProfile") }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">Nombre</label>
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                   name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">E mail</label>
                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                   name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Cambiar contraseña
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("password.updated") }}">
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">Nueva contraseña</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                   type="password" name="password" id="password" required>
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">Repetir contraseña</label>
                            <input class="form-control" type="password" name="password_confirmation"
                                   id="password_confirmation" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Borrar cuenta
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route("password.destroyProfile") }}"
                          onsubmit="return prompt('Ingrese su dirección de correo electronico para confirmar que desea eliminar la cuenta\n Esta accion no es reversible') == '{{ auth()->user()->email }}'">
                        @csrf
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                Eliminar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
