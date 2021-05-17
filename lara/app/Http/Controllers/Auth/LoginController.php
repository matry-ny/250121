<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entities\UserEntity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private const LOGIN_ERROR = 'Email or password is invalid';

    public function process(Request $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|exists:users',
            'password' => function ($attribute, $value, $fail) use ($request) {
                /** @var UserEntity $user */
                $user = UserEntity::where('email', $request->get('email'))->first();
                if (!$user) {
                    $fail(self::LOGIN_ERROR);
                }

                $isValidPassword = Hash::check($request->get('password'), $user->password);
                if (!$isValidPassword) {
                    $fail(self::LOGIN_ERROR);
                }
            },
        ]);

        Auth::login();
        var_dump($validated);exit;
    }
}
