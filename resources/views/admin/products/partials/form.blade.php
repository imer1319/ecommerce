<div class="row">
    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               name="name" id="name" value="{{ old('name', $product->name) }}" required autocomplete="name" autofocus>
        @error('name')
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">url</label>
        <input type="text" name="slug" id="slug" class="form-control"
               value="{{ old('slug', $product->slug) }}">
        @error('slug')
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Price</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror"
               name="price" value="{{ old('price', $product->price) }}" required autocomplete="price">
        @error('price')
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Descripcion</label>
        <textarea class="form-control @error('description') is-invalid @enderror"
                  name="description" required
                  autocomplete="description">{{ old('description', $product->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label for="categories">Categorias</label>
        <select class="form-control" name="category_id">
            <option value=""> --Selecciona la categoria--</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @if($errors->has('category_id'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('tags') }}
            </div>
        @endif
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label for="tags">Etiquetas</label>
        <div style="padding-bottom: 4px">
            <span class="btn btn-primary btn-sm select-all">Seleccionar Todo</span>
            <span class="btn btn-primary btn-sm deselect-all">Deseleccionar</span>
        </div>
        <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags"
                multiple>
            @foreach($tags as $id => $tag)
                <option
                    value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $product->tags->contains($id)) ? 'selected' : '' }}>
                    {{ $tag }}
                </option>
            @endforeach
        </select>
        @if($errors->has('tags'))
            <div class="invalid-feedback d-block">
                {{ $errors->first('tags') }}
            </div>
        @endif
    </div>

    <div class="form-group col-md-10 offset-md-1">
        <label class="form-control-label">Imagen</label>
        @if($product->image)
            <img class="my-2 float-right rounded" src="{{ asset('image/'.$product->image->url) }}" height="60"
                 width="60">
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
        <a href="{{ route('products.index') }}" class="btn btn-block btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary btn-block mt-0">
            Registrar
        </button>
    </div>
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
