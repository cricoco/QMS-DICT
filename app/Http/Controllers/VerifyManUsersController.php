<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerifyManUsersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('is_verifiedman', false)
            ->where(function ($queryBuilder) use ($search) {
                $queryBuilder->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('designation', 'LIKE', "%$search%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10)
            ->appends([
                'search' => $search,
            ]);
        return view('admin.verify', compact('users'));
    }

    public function verify(User $user)
    {
        $user->update(['is_verifiedman' => true]);
        return redirect()->back()->with('status', 'User verified successfully.');
    }
}

