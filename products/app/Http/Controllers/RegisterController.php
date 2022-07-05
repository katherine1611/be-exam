<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function store(Request $request){
        try{
            $input = $request->all();
            User::create($input);
            return back()->with('success', 'Record added successfully, ready to logged in');
        }
        catch(\Exception $e){
            return back()->with('error', 'Something went wrong, please try again later');
        }
    }
}
