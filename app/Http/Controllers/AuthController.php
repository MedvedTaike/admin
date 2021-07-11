<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.show');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
    		'phone'	=>	'required|string|size:10',
    		'password'	=>	'required|max:15|min:5'
        ]);
        $user = User::where('phone', $request->get('phone'))->where('role', 'admin')->first();
        
        if($user != null){
            if(Hash::check($request->get('password'), $user->password)){
                Auth::login($user);
                return redirect('/admin');
            }
        }
        return redirect()->back()->with('status', 'Неправильный логин или пароль');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');
    }
}
