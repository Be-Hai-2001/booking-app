<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ShowFormLogIn()
    {
        return view('admin.login');
    }

    public function ShowFormRegister(){
        return view('admin.Register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Register(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];

        $request->validate($rules);

        $User = User::create([
            'tenUser'=>$request->tenUser,
            'cccd'=>$request->cccd,
            'email'=>$request->email,
            'sdt'=>$request->sdt,
            'password'=>Hash::make($request->password),
            'trangThai'=>$request->trangThai,
            'is_admin'=>$request->is_admin
        //    token
        ]);
        //auth()->login($User);
        $User->save();
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Login(Request $request) : RedirectResponse
    {
        $rules = [
            'email' => 'required',
            'password' => 'required|string'
        ];
        $abc=$request->validate($rules);
        // find user email in users table
        $user = User::where('email', $request->email)->first();

        //Chuyển điều kiện trang middleware admin
        $pass = User::where('password', $request->password)->first();

        if(Auth::attempt($abc)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        else if ($user && $pass){
            if($user->is_admin == 1){

                session(['key' => 1]);
               // dd(session());
                return redirect()->route('dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function Logout(Request $request) : RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
