<form action="{{ route('tags.destroy', $slug) }}" method="post">
    @csrf
    @method('DELETE')
    @can('tags_edit')
        <a href="{{ route('tags.edit', $slug) }}" class="btn btn-primary btn-sm">Edit</a>
    @endcan
    @can('tags_show')
        <a href="{{ route('tags.show', $slug) }}" class="btn btn-warning btn-sm">Show</a>
    @endcan
    @can('tags_destroy')
        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure?')">
    @endcan

</form>
