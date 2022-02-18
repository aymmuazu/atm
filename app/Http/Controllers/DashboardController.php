<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }

    public function storeprofile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->save();

        return redirect()->route('dashboard')->with('status', 'Profile Updated');
    }

    public function password()
    {
        return view('user.password');
    }

    public function storepassword(Request $request)
    {
        $this->validate($request, [
            'current' => 'required|min:8|',
            'new' => 'required|min:8|different:current',
            'confirm' => 'required|min:8|same:new',
        ]);

        
        if (!Hash::check($request->input('current'), auth()->user()->password)) {
            $request->session()->flash('error', 'Current password does not match!');
            return redirect()->back();
        }

        $password  = User::find(auth()->user()->id);
        $password->password = bcrypt($request->input('confirm'));
        $password->save();

        return redirect()->route('dashboard')->with('status', 'Password Changed.');
    }

    public function map()
    {
        return view('user.map');
    }

    public function parameters()
    {
        return view('user.location');
    }
}
