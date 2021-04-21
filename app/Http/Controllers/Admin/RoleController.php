<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles_index')->only(['index', 'dataTable']);
        $this->middleware('permission:roles_create')->only(['create', 'store']);
        $this->middleware('permission:roles_edit')->only(['edit', 'update']);
        $this->middleware('permission:roles_show')->only('show');
        $this->middleware('permission:roles_destroy')->only('destroy');
    }

    public function dataTable()
    {
        return DataTables::of(Role::select('id', 'name'))
            ->addColumn('permissions', function (Role $role) {
                $return = '';
                foreach ($role->permissions as $key => $permision) {
                    $return .= '<span class="badge badge-primary mr-1">' . $permision->name . '</span>';
                    if (($key+1) % 4 == 0) {
                        $return .= '<br>';
                    }
                }
                return $return;
            })
            ->addColumn('btn', 'admin.roles.partials.btn')
            ->rawColumns(['btn', 'permissions'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        $role = new Role();
        $permissions = Permission::all()->pluck('name', 'id');
        return view('admin.roles.create', compact('permissions', 'role'));
    }

    public function store(CreateRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        $role->load('permissions');
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->permissions()->sync($request->input('permissions', []));
        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }
}
