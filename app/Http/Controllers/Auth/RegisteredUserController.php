<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use FileUpload;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        switch ($request->type) {
            case 'student':
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'student',
                    'status' => 'approved',
                ]);
                break;
            case 'instructor':
                $request->validate(['attachment' => 'required|mimes:jpg,png,pdf,doc,docx|max:30000']);
                $filePath = $this->uploadFile($request->file('attachment'));

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'student',
                    'status' => 'pending',
                    'attachment' => $filePath,
                ]);
                break;
            default:
                abort(404);
                break;
        }

        event(new Registered($user));

        Auth::login($user);

        $role = $request->user()->role;
        return redirect()->intended(route($role . '.dashboard', absolute: false));
    }
}
