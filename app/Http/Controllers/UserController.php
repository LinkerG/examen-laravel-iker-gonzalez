<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function main(){
        return view("main");
    }
    public function login($fail = null){
        $error = $fail;
        return view("login", compact("error"));
    }

    public function register(Request $request){
        request()->validate([
            'mail' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'adress' => 'required',
            'birthDate' => 'required',
            'gender' => 'required',
            'passwd' => 'required',
            'passwdAgain' => 'required'
        ]);

        $mail = request()->input('mail');
        $name = request()->input('name');
        $surname = request()->input('surname');
        $adress = request()->input('adress');
        $birthDate = request()->input('birthDate');
        $gender = request()->input('gender');
        $passwd = request()->input('passwd');
        $passwdAgain = request()->input('passwdAgain');

        $user = User::where('mail', $mail)->first();
        
        if($passwd == $passwdAgain and !$user) {

            $registered = new User;
            $registered->mail = $mail;
            $registered->name = $name;
            $registered->surname = $surname;
            // $registered->userAdress = $adress;
            // $registered->userGender = $gender;
            // $registered->userBirthDay = $birthDate;
            $registered->password = Hash::make($passwd);
            $registered->save();

            Auth::guard('user')->login($registered);
            session(['userMail' => $registered->mail]);

            return redirect()->route('main');
        }else{
            return redirect()->route('registerForm');
        }
    }

    public function registerForm(){
        return view('register');
    }

    public function auth(){
        request()->validate([
            'mail' => 'required',
            'passwd' => 'required',
        ]);
        $mail = request()->input('mail');
        $passwd = request()->input('passwd');
        $user = User::where('nick', $mail)->first();
        if($user && Hash::check($passwd, $user->password)) {
            Auth::guard('user')->login($user);
            session(['userMail' => $user->nick]);
            return redirect()->route('main');
        }elseif(!$user){
            $error = "mail";
            return redirect()->route('login', compact("error"));
        }else{
            $error = "passwd";
            return redirect()->route('login', compact("error"));
        }
    }

    
    public function logout(Request $request){
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
