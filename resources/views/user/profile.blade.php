@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 h4">
                Datos escenciales
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="#">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Apellidos</label>
                                    <input class="form-control {{ $errors->has('last_names') ? 'is-invalid' : '' }}"
                                           type="text"
                                           name="last_names" value="{{ old('last_names', $profile->last_names) }}"
                                           required
                                    >
                                    @if($errors->has('last_names'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('last_names') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Telefono</label>
                                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                           type="text"
                                           name="phone" value="{{ old('phone', $profile->phone) }}"
                                           required
                                    >
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Carnet de identidad</label>
                                    <input class="form-control {{ $errors->has('ci') ? 'is-invalid' : '' }}"
                                           type="text"
                                           name="ci" value="{{ old('ci', $profile->ci) }}"
                                           required
                                    >
                                    @if($errors->has('ci'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('ci') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Pais</label>
                                    <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                           type="text"
                                           name="country" value="{{ old('country', $location->country) }}"
                                           required
                                    >
                                    @if($errors->has('country'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ciudad</label>
                                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="address" value="{{ old('address', $location->address) }}"
                                       required
                                >
                                @if($errors->has('address'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-0 float-right">
                                <button class="btn btn-primary" type="submit">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 h4">
                Datos del usuario
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route("password.updateProfile") }}">
                            @csrf
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="name" value="{{ old('name', auth()->user()->name) }}"
                                       required
                                >
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       type="text"
                                       name="email" value="{{ old('email', auth()->user()->email) }}"
                                       required
                                >
                                @if($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-0 float-right">
                                <button class="btn btn-primary" type="submit">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 h4">
                Cambiar contraseña
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route("password.updated") }}">
                            @csrf
                            <div class="form-group">
                                <label>Nueva contraseña</label>
                                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       type="password" name="password" placeholder="Nueva contraseña" required>
                                @if($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Repita la contraseña</label>
                                <input class="form-control" type="password" name="password_confirmation"
                                       id="password_confirmation" placeholder="repetir contraseña" required>
                            </div>
                            <div class="form-group mb-0 float-right">
                                <button class="btn btn-primary" type="submit">
                                    guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
