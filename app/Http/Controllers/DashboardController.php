<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    public function index(){

        if(Auth::user()->hasRole('user')){
            return view('userdash');
        }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
        }

    }

    public function profile(){
        return view('profile');
    }
}
