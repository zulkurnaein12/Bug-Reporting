<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        //cek kesamaan password
        if (!(Hash::check($request->get('old_password'), $user->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        //cek kesamaan password lama dan baru
        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        //update password in table user
        $user->password = bcrypt($request->get('password'));
        $user->save();
        activity()->performedOn($user)->log('Update Password');
        //redirect back
        return redirect()->back();
    }
}
