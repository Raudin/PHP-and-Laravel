<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Appp\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype =Auth()->user()->role_id;
            if($usertype == '2')
            {
                return view('dashboard');
            }
            
            else if ($usertype=='1');
            {
                return view('events.create');
            }

        }

    }
}
