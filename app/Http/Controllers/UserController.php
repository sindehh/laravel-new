<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
class UserController extends Controller
{

    public function useer()
    {
        $data = DB::table("users")->get();
        return view('user.useer',['users'=>$data]);
    } 

    public function login(){
        return view ('user.login');
    }

    public function process(Request $req){
        $validated = $req->validate([
            "email"=>['required', 'email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($validated)){
            $req->session()->regenerate();

            return redirect("/")-> with('success', 'Succesfully Logged In');
        }


    }

    public function register(){
        return view ('user.register');
    }


    public function store(Request $req){
        //dd($req);
        $validated=$req->validate([
            "name"=>['required','min:4'],
            "email"=>['required','email', Rule::unique('users','email'),],
            "password"=>'required|confirmed|min:6'
        ]);

        $validated['password']=Hash::make($validated['password']);
        $user=User::create($validated);

        return redirect("/");

    }

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('login')-> with('successLogout', 'Succesfully Logged-Out');
    }
    
    public function delete($id){
        $delete = DB::table('customers')
        ->where('id', $id)
        ->delete();
        return redirect('/')-> with('success', 'A record has been deleted!');
    }
   
} 
