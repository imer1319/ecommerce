<div class="row">
    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Name</label>
        @if ($role->name == 'Administrator')
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $role->name) }}" required autocomplete="name" readonly>
        @else
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $role->name) }}" required autocomplete="name" autofocus>
        @endif
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="required" for="permissions">Permisos</label>
        <div class="pb-2">
            <span class="btn btn-light btn-sm select-all">Seleccionar todo</span>
            <span class="btn btn-light btn-sm deselect-all">Deseleccionar</span>
        </div>
        <div class="row">
            @foreach ($permissions as $permission)
                <div class="col-md-4">
                    <div class="checkbox">
                        <label>
                            <input name="permissions[]" type="checkbox" value="{{ $permission->name }}"
                                {{ $role->permissions->contains($permission->id) || collect(old('permissions'))->contains($permission->name)
                                    ? 'checked'
                                    : '' }}
                                class="permisos">
                            {{ $permission->description }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($errors->has('permissions'))
            <div class="invalid-feedback">
                {{ $errors->first('permissions') }}
            </div>
        @endif
    </div>

    <div class="form-group btn-group">
        <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Regresar</a>
        <button class="btn btn-primary">{{ $button }}</button>
    </div>
</div>
