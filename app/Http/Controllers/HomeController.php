<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klinik;
use App\Models\Publik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function Index(){
        return view('home');
    }// end method

    public function Logout(){
        Auth::guard('home')->logout();
        return redirect()->route('home')->with('success', 'Klinik Logout Successfully!');
    } //End Method
}
