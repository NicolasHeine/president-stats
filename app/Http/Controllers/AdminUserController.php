<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $validated = $request->safe()->all();

        $user = new User();
        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->password = Hash::make($validated['password']);
        $user->is_admin = true;
        $user->save();

        return to_route('admin.users');
    }

    public function show(User $user)
    {
        return view('admin.users.show');
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
