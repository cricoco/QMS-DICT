<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('is_verifiedman', true) // Filter only verified users
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('email', 'LIKE', "%$search%")
                        ->orWhere('designation', 'LIKE', "%$search%");
                }
            })
        ->orderBy('name', 'asc')
        ->paginate(10)
        ->appends(['search' => $search]);

        return view('admin.users', compact('users'));
    }

    public function promote(User $user)
    {
        $user->update(['role_id' => '1']);
        return redirect()->back()->with('status', 'User promoted to admin successfully.');
    }

    public function demote(User $user)
    {
        $user->update(['role_id' => '0']);
        return redirect()->back()->with('status', 'User demoted from admin successfully.');
    }
}
