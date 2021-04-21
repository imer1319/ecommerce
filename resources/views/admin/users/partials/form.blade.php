<div class="row">
    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
        @error('name')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror"
               name="email"
               value="{{ old('name', $user->email) }}" required autocomplete="email">
        @error('email')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label for="password" class="form-control-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="required" for="roles">Roles</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-default btn-sm select-all" style="border-radius: 0">Seleccionar Todo</span>
            <span class="btn btn-default btn-sm deselect-all" style="border-radius: 0">Deseleccionar</span>
        </div>
        <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
            @foreach($roles as $id => $roles)
                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
            @endforeach
        </select>
        @if($errors->has('roles'))
            <div class="invalid-feedback">
                {{ $errors->first('roles') }}
            </div>
        @endif
    </div>

    <div class="form-group col-md-10 offset-md-1 d-flex">
        <a href="{{ route('users.index') }}" class="btn btn-block btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary btn-block mt-0">
            {{ $button }}
        </button>
    </div>
</div>
