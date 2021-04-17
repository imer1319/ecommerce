<div class="form-group col-md-10 offset-md-1">
    <label class="form-control-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"
           name="name" id="name" value="{{ old('name', $category->name) }}" required autocomplete="name" autofocus>
    @error('name')
    <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group col-md-10 offset-md-1">
    <label class="form-control-label">url</label>
    <input type="text" name="slug" id="slug" class="form-control"
           value="{{ old('slug', $category->slug) }}">
    @error('slug')
    <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="form-group col-md-10 offset-md-1">
    <label class="form-control-label">Imagen</label>
    @if($category->image)
        <img class="my-2 float-right rounded" src="{{ asset('image/'.$category->image->url) }}" height="60" width="60">
    @endif
    <div class="custom-file">
        <input type="file" name="url" class="custom-file-input">
        <label class="custom-file-label" for="customFileLang">Select file</label>
    </div>
    @error('url')
    <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group col-md-10 offset-md-1 d-flex">
    <a href="{{ route('categories.index') }}"
       class="btn btn-block btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary btn-block mt-0">
        {{ $button }}
    </button>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $("#name").keyup(function () {
                var cadena = $(this).val();
                string_to_slug(cadena);
            });
        });


        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, '');
            str = str.toLowerCase();

            //quita acentos, cambia la ñ por n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";

            for (var i = 0, l = from.length; i < l; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
                .replace(/\s+/g, '-') // reemplaza los espacios por -
                .replace(/-+/g, '-'); // quita las plecas

            return $("#slug").val(str);
        }
    </script>
@endsection
