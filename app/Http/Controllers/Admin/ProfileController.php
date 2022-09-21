<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.profile.index', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'job' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|max:12',
            'about' => 'nullable',
            'avatar' => 'nullable',
        ]);

        if ($request->file('avatar')) {
            $file = $request->file('avatar')->store('avatar', 'public');
            $data['avatar'] = $file;
        }

        $user->update($data);
        return redirect()->route('admin.profile.index');
    }
}
