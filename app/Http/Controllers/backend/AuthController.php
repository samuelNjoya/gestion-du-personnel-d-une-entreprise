<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
       // echo Hash::make(123456);  //$2y$12$jzfHPh1BodpC0TYA6.EAyebMLGWUJEblZSHZS7PV6xtlwgmRKVquW
       // die;
        $data['meta_title'] = "Login";
        return view('auth.login', $data);
    }

    public function logout(){
        Auth::logout();
        return redirect(url(''));
    }

    public function auth_login(Request $request){
       // dd($request->all());
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_delete' => 0, 'status' => 1], true))
       {
        return redirect('panel/dashboard');
      }
      else
      {
         return redirect()->back()->with('error','wrong email or password');
      }
    }
}
