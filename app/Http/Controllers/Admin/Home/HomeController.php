<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    // admin
    public function home() {
        
        return view('bankend.admin.home');
    }    
    
        
}
