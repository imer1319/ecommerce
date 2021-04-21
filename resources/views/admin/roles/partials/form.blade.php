<div class="row">
    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" value="{{ old('name', $role->name) }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="required"
               for="permissions">Permisos</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-default btn-sm select-all" style="border-radius: 0">Seleccionar todo</span>
            <span class="btn btn-default btn-sm deselect-all" style="border-radius: 0">Deseleccionar</span>
        </div>
        <select
            class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
            name="permissions[]" id="permissions" multiple required>
            @foreach($permissions as $id => $permissions)
                <option
                    value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
            @endforeach
        </select>
        @if($errors->has('permissions'))
            <div class="invalid-feedback">
                {{ $errors->first('permissions') }}
            </div>
        @endif
    </div>

    <div class="form-group col-md-10 offset-md-1 d-flex">
        <a href="{{ route('roles.index') }}" class="btn btn-block btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary btn-block mt-0">
            {{ $button }}
        </button>
    </div>
</div>
