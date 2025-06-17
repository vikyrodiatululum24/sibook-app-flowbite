<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function users(Request $request)
    {
        $users = User::query();

        // DataTables global search
        if ($request->has('search') && $request->input('search.value') !== null) {
            $search = $request->input('search.value');
            if (!empty($search)) {
            $users->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
            }
        }

        return datatables()
            ->of($users)
            ->addColumn('action', function ($user) {
                return view('users.partials.action', compact('user'))->render();
            })
            ->rawColumns(['action']) // wajib jika return HTML
            ->make(true);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'role' => 'required|in:admin,user', // Assuming you have roles like 'admin' and 'user'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,user', // Assuming you have roles like 'admin' and 'user'
        ]);

        // dd($validatedData);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }
        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
