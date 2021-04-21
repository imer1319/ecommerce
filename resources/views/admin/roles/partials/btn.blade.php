<form action="{{ route('roles.destroy', $id) }}" method="post">
    @csrf
    @method('DELETE')
    @can('roles_edit')
        <a href="{{ route('roles.edit', $id) }}" class="btn btn-primary btn-sm">Edit</a>
    @endcan
    @can('roles_show')
        <a href="{{ route('roles.show', $id) }}" class="btn btn-warning btn-sm">Show</a>
    @endcan
    @can('roles_destroy')
        <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger"
               onclick="return confirm('Are you sure?')">
    @endcan

</form>
