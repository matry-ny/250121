<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    private const LOGIN_ERROR = 'Email or password is invalid';

    private ?User $user = null;

    public function process(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'email' => 'required|exists:users',
            'password' => function ($attribute, $value, $fail) use ($request) {
                $this->user = User::where('email', $request->get('email'))->first();
                if (!$this->user) {
                    $fail(self::LOGIN_ERROR);
                }

                $isValidPassword = Hash::check($request->get('password'), $this->user->password);
                if (!$isValidPassword) {
                    $fail(self::LOGIN_ERROR);
                }
            },
        ]);

        Auth::login($this->user);

        return redirect('/');
    }
}
