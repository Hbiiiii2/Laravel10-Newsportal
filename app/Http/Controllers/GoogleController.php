<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userFromGoogle = Socialite::driver('google')->user();

        $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

        if (!$userFromDatabase) {
            $newUser = new User([
                'google_id' => $userFromGoogle->getId(),
                'name' => $userFromGoogle->getName(),
                'email' => $userFromGoogle->getEmail(),
                'password' => bcrypt('123456dummy'),
            ]);

            $newUser->role_id = 2;
            $newUser->save();

            auth('web')->login($newUser);
            session()->regenerate();

            return redirect()->route('home')->with('success', 'Berhasil Login');
        }

        auth('web')->login($userFromDatabase);
        session()->regenerate();

        if (Session::has('post_slug')) {
            $slug = Session::get('post_slug');
            Session::forget('post_slug'); // Clear session after use

            return redirect()->route('home', $slug)->with('success', 'Anda Berhasil Login');
        }

        return redirect()->route('home')->with('success', 'AndaBerhasil Login');
    }

    public function setPostSlug(Request $request)
    {
        if ($request->has('post_slug')) {
            Session::put('post_slug', $request->post_slug);
            return redirect()->route('login.google');
        }

        return response()->json(['success' => false]);
    }

}
