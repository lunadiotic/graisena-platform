<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('pages.profile.index')->with([
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = User::findOrFail($user->id);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,' .  $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->password) {
            $request['password'] = Hash::make($request->password);
            $data->update($request->all());
        }

        $data->update($request->except('password'));

        return redirect()->route('profile.index')->with([
            'status' => 'Success!'
        ]);
    }
}
