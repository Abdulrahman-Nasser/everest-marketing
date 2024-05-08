<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminAuthController extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|min:8|max:25|string'
        ]);

    //   $admins= new App\Models\Admin;
    //     $admins->name = 'everest';
    //     $admins->email = 'everest@marketing.com';
    //     $admins->password = bcrypt('everest@admin');
    //     $admins->save();

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.home');

        } else {
            return redirect()->back()->with(['error' => 'Wrong Email or Password']);
        }



    }
}
