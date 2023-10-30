<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        $data = $request -> validate ([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect("/");
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect("/");
    }

    public function register(Request $request){
        $data = $request -> validate([
            "username"=> [
                "required",
                Rule::unique("users","name")
            ],
            "password"=> "required"
        ]);

        $data["password"] = bcrypt($data["password"]);

        $user = User::create($data);

        auth()->login($user);
        
        return redirect("/");
    }
    
}
