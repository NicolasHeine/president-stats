<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ValidatedInput;
use Illuminate\Validation\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check() || Auth::guard('admin')->check()) {
            return redirect('/');
        }
        return view('login');
    }

    public function auth(Request $request)
    {
        if (Auth::check() || Auth::guard('admin')->check()) {
            return redirect('/');
        }
        // Retrieve the validated input data...
        $validated = $request->validate([
            'email' => 'bail|required|email|exists:users',
            'password' => 'required',
        ]);

        // Get admin information
        $user = User::where('email', $validated['email'])->first();

        // Check if password is correct
        if(!Hash::check($validated['password'], $user->password)){
            return back()->withErrors('Ce compte n\'existe pas');
        }

        if($user->is_admin){
            if (Auth::guard('admin')->attempt($validated)) {
                $request->session()->regenerate();
                return to_route('admin');
            }else{
                return back()->withErrors('Ce compte n\'existe pas.');
            }
        }else{
            if (Auth::attempt($validated)) {
                $request->session()->regenerate();
                return redirect('/');
            }else{
                return back()->withErrors('Ce compte n\'existe pas.');
            }
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
