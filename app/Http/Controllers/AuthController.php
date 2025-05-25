<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->middleware('auth', ['only' => ['logout']]);
    }

    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'password'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => 'error',
                'errors'     => $validator->errors()
            ]);
        }

        $user = DB::table('users')
            ->where('name', $request->name)
            ->first();
        if (!$user) {
            return response()->json([
                'status'    => 'error',
                'toast'     => 'name atau password salah!',
                'resets'    => 'all'
            ]);
        }

        $credentials = [
            'name'      => $request->name,
            'password'      => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $session = [
                'name'      => $request->name,
            ];

            Session::put($session);
            return response()->json([
                'status'    => 'success',
                'toast'     => 'Login berhasil',
                'redirect'  => route('dashboard')
            ]);
        } else {
            return response()->json([
                'status'    => 'error',
                'toast'     => 'name atau password salah!',
                'resets'    => 'all'
            ]);
        }

        return response()->json([
            'status'    => 'error',
            'toast'     => 'Login gagal, silahkan tunggu beberapa saat lagi atau hubungi administrator'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('auth.login'));
    }
}