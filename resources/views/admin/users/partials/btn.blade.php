<form action="{{ route('users.destroy', $id) }}" method="post">
    @csrf
    @method('DELETE')
    @can('users_edit')
        <a href="{{ route('users.edit', $id) }}" class="btn btn-primary btn-sm">Edit</a>
    @endcan
    @can('users_show')
        <a href="{{ route('users.show', $id) }}" class="btn btn-warning btn-sm">Show</a>
    @endcan
    @can('users_destroy')
        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure?')">
    @endcan

</form>
