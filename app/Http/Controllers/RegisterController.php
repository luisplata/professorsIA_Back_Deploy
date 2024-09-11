<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register.register');
    }

    public function userRegister(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->lastName = $request->lastName;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->confirmPassword = Hash::make($request->confirmPassword);
        $data->save();

        /* return redirect()->route('register')->with('success', 'Usuario registrado exitosamente.'); */
        return redirect('login');
        /* return redirect()->route('admin.inicio'); */

    }
}
