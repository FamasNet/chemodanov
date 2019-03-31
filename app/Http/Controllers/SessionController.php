<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    
    public function __construct(){
    
        $this->middleware('guest')->except('destroy');

    }
    
    public function create(){
    
        return view('sessions.create');

    }

    public function store(Request $request){
    
        $credentials = ([
            'email' => $request->email,
            'password' => $request->password,    
        ]);

        if (!auth()->attempt($credentials)){
            
            return back()->witherrors([
                    'massege' => 'Pleace, check your credentials and try again!'
            ]);
        } else{
            return redirect()->home();
        }


    }

    public function destroy(){
    
        Auth::logout();

        return redirect()->home();

    }
}
