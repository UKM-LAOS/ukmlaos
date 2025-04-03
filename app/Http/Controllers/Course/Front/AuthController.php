<?php

namespace App\Http\Controllers\Course\Front;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ResponseFormatterController;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('pages.course.front.auth.login', [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('pages.course.front.auth.register', [
            'title' => 'Register',
        ]);
    }

    public function createAccount(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|email:dns|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique' => 'Nama sudah digunakan',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.email:dns' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        DB::beginTransaction();
        try
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $user->assignRole('student');

            DB::commit();
            Auth::login($user);
            return redirect()->route('course.dashboard.index')->with('success', 'Akun berhasil dibuat. Selamat datang ' . $user->name);
        }catch(Exception $e)
        {
            Log::error($e->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silahkan coba lagi')->withInput($request->all());
        }
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended()->with('success', 'Selamat datang ' . Auth::user()->name);
        }
        
        return redirect()->back()->with('error', 'Email atau password salah')->withInput([
            'email' => $request->email,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return ResponseFormatterController::success(message: 'Logout Success');
    }
}
