<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:users_index')->only(['index','dataTable']);
        $this->middleware('permission:users_create')->only(['create','store']);
        $this->middleware('permission:users_edit')->only(['edit','update']);
        $this->middleware('permission:users_show')->only('show');
        $this->middleware('permission:users_destroy')->only('destroy');
    }

    public function dataTable()
    {
        return DataTables::of(User::select('id','email','name'))
            ->addColumn('role', function (User $user){
                $return = '';
                foreach ($user->roles as $key=>$role){
                    $return .= '<span class="badge badge-primary mr-1">'.$role->name.'</span>';
                }
                return $return;
            })
            ->addColumn('btn','admin.users.partials.btn')
            ->rawColumns(['btn','role'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $user = new User();
        return view('admin.users.create',compact('roles','user'));
    }

    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show',compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit',compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->validated())->save();
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
