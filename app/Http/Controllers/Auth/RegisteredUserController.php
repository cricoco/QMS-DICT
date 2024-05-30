<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([      /* Validating the quest of client before proceeding */
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'designation' => ['required', 'string', 'max:255'],
        // ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class, function ($attribute, $value, $fail) {
                if (!str_ends_with($value, '@dict.gov.ph')) {
                    $fail('The email must be an @dict.gov.ph address.');
                }
            }],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'designation' => ['required', 'string', 'max:255'],
        ]);

        if ($request->division === 'N/A' && $request->unit === 'N/A') {
            return redirect()->back()->withErrors(['division' => 'Division should not be marked as N/A'])->withInput();
        }

        $user = User::create([          /* If validation success, go here and run to fill out database */
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'designation' => $request->designation,
            'division' => $request->division,
            'unit' => $request->unit,
            'is_verifiedman' => false,
        ]);
        
        event(new Registered($user));      /* User is now registered after previous lines were true */

        //Auth::login($user);         /* Logs in user */

        return redirect(route('login'))->with('status', 'Registration successful! Please wait for confirmation.');
    }
}
