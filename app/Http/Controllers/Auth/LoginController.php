<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function loginPageShow()
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        return redirect()->route('home');

    }
    public function registerPageShow()
    {
        if(!Auth::check()){
            return view('auth.register');
        }
        return redirect()->route('home');

    }
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (!Auth::guard('web')->attempt($credentials))
                throw new \Exception(__('Girdiğiniz bilgiler ile eşleşen hesap bulunamadı.'));
            $request->session()->regenerate();
            return response()->json();
        } catch (\Throwable $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            Auth::guard('web')->login($user);
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => __('Kayıt başarılı.'),
            ]);
        } catch (\Throwable $exception) {
            throw ValidationException::withMessages([$exception->getMessage()]);
        }
    }
}
