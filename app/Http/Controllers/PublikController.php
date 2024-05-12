<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Publik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PublikController extends Controller
{
    public function Index(){
        return view('publik.publik_login');
    }// End Method

    public function PublikDashboard(){
        return view('publik.homepublik');
    }// End Method

    public function PublikLogin(Request $request){
        //dd($request->all());
        $check = $request->all();
        if(Auth::guard('publik')->attempt(['email' => $check['email'], 'password' => $check['password'] ]))
        {
            return redirect()->route('publik.dashboard')->with('error', 'User Login Successfully!');
        }else{
            return back()->with('error', 'Invalid Email or Password.');
        }
    }

    public function PublikRegister(){
        return view('publik.publik_register');
    } //End Method

    public function PublikRegisterCreate(Request $request){
        //dd($request->all()); <-- TO CHECK

        Publik::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('publik_login_from')->with('success', 'User Created Successfully!');
    }

    public function PublikLogout(){
        Auth::guard('publik')->logout();
        return redirect()->route('publik_login_from')->with('success', 'User Logout Successfully!');
    } //End Method
}
