<div class="form-group col-md-10 offset-md-1">
    <label class="form-control-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"
           name="name" id="name" value="{{ old('name', $tag->name) }}" required autocomplete="name" autofocus>
    @error('name')
    <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-md-10 offset-md-1">
    <label class="form-control-label">url</label>
    <input type="text" name="slug" id="slug" class="form-control"
           value="{{ old('slug', $tag->slug) }}" readonly>
    @error('slug')
    <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group col-md-10 offset-md-1 d-flex">
    <a href="{{ route('tags.index') }}"
       class="btn btn-block btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary btn-block mt-0">
        {{ $button }}
    </button>
</div>

@section('scripts')
    <script src="{{ asset('js/slug.js') }}"></script>
@endsection
