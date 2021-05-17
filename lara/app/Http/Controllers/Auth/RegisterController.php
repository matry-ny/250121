<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entities\UserEntity;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function process(Request $request): Redirector|Application|RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'min:3|required_with:repeatPassword|same:repeatPassword',
            'repeatPassword' => 'min:3',
        ]);

        $user = new UserEntity();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect('/login');
    }
}
