<?php

namespace App\Http\Controllers\Admin\Dashboad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboadController extends Controller
{
    //

    public function dashboard(){
        return view('bankend.admin.dashboad');
    }
}
