<form action="{{ route('products.destroy', $slug) }}" method="post">
    @csrf
    @method('DELETE')
    @can('products_edit')
        <a href="{{ route('products.edit', $slug) }}" class="btn btn-primary btn-sm">Edit</a>
    @endcan
    @can('products_show')
        <a href="{{ route('products.show', $slug) }}" class="btn btn-warning btn-sm">Show</a>
    @endcan
    @can('products_destroy')
        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure?')">
    @endcan

</form>
