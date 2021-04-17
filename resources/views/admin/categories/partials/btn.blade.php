<form action="{{ route('categories.destroy', $slug) }}" method="post">
    @csrf
    @method('DELETE')
    @can('categories_edit')
        <a href="{{ route('categories.edit', $slug) }}" class="btn btn-primary btn-sm">Edit</a>
    @endcan
    @can('categories_show')
        <a href="{{ route('categories.show', $slug) }}" class="btn btn-warning btn-sm">Show</a>
    @endcan
    @can('categories_destroy')
        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure?')">
    @endcan

</form>
