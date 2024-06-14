<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $data = array_map('str_getcsv', file($file->getRealPath()));

        // Assuming the first row contains the header
        $header = array_shift($data);

        $errors = [];
        foreach ($data as $row) {
            $row = array_combine($header, $row);

            $validator = Validator::make($row, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'designation' => 'nullable|string|max:255',
                'role_id' => 'required|in:0,1',
                'is_verifiedman' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                $errors[] = [
                    'row' => $row,
                    'errors' => $validator->errors()->all(),
                ];
                continue; // Skip invalid rows
            }

            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'designation' => $row['designation'],
                'role_id' => $row['role_id'],
                'is_verifiedman' => $row['is_verifiedman'],
            ]);
        }

        return redirect()->route('admin.users')->with([
            'status' => 'Users uploaded successfully.',
            'errors' => $errors,
        ]);
    }

}
