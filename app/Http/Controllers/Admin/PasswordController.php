<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('admin.extras.edit-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('home')->with('message','modificado correctamente');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('home')->with('message','modificado correctamente');
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('Eliminado correctamente'));
    }
}
