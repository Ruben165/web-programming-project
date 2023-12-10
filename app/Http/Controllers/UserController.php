<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Rules\ValidEmail;
use App\Rules\ValidPhone;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'username' => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'email' => ['bail', 'required', 'string', new ValidEmail, 'unique:users'],
            'password' => ['bail', 'required', 'string', 'min:5', 'max:255'],
            'confirm_password' => ['bail', 'required', 'string', 'min:5', 'max:255', 'same:password']
        ]);

        $user = User::create([
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        $cart = Cart::create([
            'user_id' => $user->id
        ]);

        return redirect()->route('login');
    }

    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'username' => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'email' => ['nullable', 'bail', 'string', new ValidEmail, 'unique:users'],
            'phone' => ['nullable', 'bail', 'string', new ValidPhone, 'unique:users'],
            'address' => ['nullable', 'bail', 'string', 'min:5'],
            'profile-picture' => ['nullable', 'bail', 'image', 'mimes:jpeg,png,jpg'],
            'current-password' => ['bail', 'required', 'string'],
        ]);

        if (!Hash::check($validated['current-password'], auth()->user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Password is incorrect']);
        }

        $user = User::where('id', auth()->user()->id)->first();

        $updatedUser = [
            'username' => $validated['username'],
        ];

        if (!is_null($request->get('email'))) {
            $updatedUser['email'] = $validated['email'];
        }

        if (!is_null($request->get('phone'))) {
            $updatedUser['phone'] = $validated['phone'];
        }

        if (!is_null($request->get('address'))) {
            $updatedUser['address'] = $validated['address'];
        }

        if (!is_null($request->file('profile-picture'))) {
            if (!is_null($user->profile_picture)) {
                Storage::delete($user['profile_picture']);
            }
            $updatedUser['profile_picture'] = $request->file('profile-picture')->store('public/profile-pictures');
        }

        $user->update($updatedUser);

        return redirect()->route('profile')->with('success', 'Successfully updated profile.');
    }
}
