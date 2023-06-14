<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
    {
        return view('User.registrasi');
    }

    public function registrasi_action(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'nullable|string',
            'nohp' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'role' => 'required|in:user,admin,pemilik',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        $user->save();
        // dd($user);
        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }


    public function login()
    {
        // $data['$title'] = 'Login';
        // return view('user/login', $data);
        return view('User.login', [
            'title' => 'Login',
        ]);
    }

    // public function login_action(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = $request->user();
    //         $token = $user->createToken('authToken')->plainTextToken;
    //         return response()->json(['token' => $token]);
    //     }

    //     return redirect()->intended('/');
    // }

    // public function login_action(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         if ($request->ajax()) {
    //             $user = $request->user();
    //             $token = $user->createToken('authToken')->plainTextToken;
    //             return response()->json(['token' => $token]);
    //         } else {
    //             return redirect()->intended('/');
    //         }
    //     }

    //     return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    // }


    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(
            'email',
            'password'
        );

        if (Auth::attempt($credentials)) {
            if ($request->ajax()) {
                $user = $request->user();
                $token = $user->createToken('authToken')->plainTextToken;
                return response()->json(['token' => $token]);
            } else {
                $user = Auth::user();
                if ($user instanceof User) {
                    if ($user->hasRole('admin')) {
                        return redirect()->intended('/dashboard');
                    } elseif ($user->hasRole('pemilik')) {
                        return redirect()->intended('/pemilik');
                    }
                }
                return redirect()->intended('/');
            }
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'berhasil logout');
    }

    public function accountUser()
    {
        $user = Auth::User();
        return view('User.acount-user', compact('user'));
    }
}
