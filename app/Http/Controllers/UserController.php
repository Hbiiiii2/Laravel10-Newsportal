<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('app.dashboard.index');
    }

    public function auth()
    {
        return view('app.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                if (Auth::check()) {
                    $request->session()->put('user', $user);
                    $request->session()->put('logged_in', true);

                    $postSlug = $request->post_slug;
                    if ($postSlug) {
                        return redirect()->route('posts.show', ['slug' => $postSlug])->with('success', 'Berhasil Login');
                    } else {
                        if ($request->has('remember_me')) {
                            $token = $user->createToken('authToken')->plainTextToken;
                            $cookie = cookie('authToken', $token, 3600); // 3600 minutes = 60 hours
                            return redirect()->route('dashboard')->withCookie($cookie)->with('success', 'Berhasil Login');
                        } else {
                            return redirect()->route('dashboard')->with('success', 'Berhasil Login');
                        }
                    }
                } else {
                    return back()->with('error', 'Terjadi kesalahan saat login. Silakan coba lagi.');
                }
            } else {
                return back()->with('error', 'Password tidak sesuai');
            }
        } else {
            return back()->with('error', 'Email belum terdaftar');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }


}
