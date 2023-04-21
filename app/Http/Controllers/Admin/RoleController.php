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
            ->addColumn('btn', 'admin.roles.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        $role = new Role();

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions', 'role'));
    }

    public function store(CreateRoleRequest $request)
    {
        $role = Role::create($request->validated());

        if ($request->has('permissions')) {

            $role->givePermissionTo($request->permissions);

        }

        return redirect()->route('admin.roles.index')->withFlash('El rol se ha creado correctamente');;
    }

    public function show(Role $role)
    {
        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $role->load('permissions');

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        $role->permissions()->detach();

        if ($request->has('permissions')) {

            $role->givePermissionTo($request->permissions);

        }

        return redirect()->route('admin.roles.index')->withFlash('El rol se ha modificado correctamente');
    }

    public function destroy(Role $role)
    {
        if ($role->id === 1) {

            return redirect()->route('admin.roles.index')->withFlash('Este rol no se puede eliminar');
       
        }

        $role->delete();

        return redirect()->back()->withFlash('Se ha eliminado el rol');;
    }
}
