<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard(){
        $data['meta_title'] = "Dashbord";
        return view('temp.dashboard', $data);
    }

    public function  dashboard1(){
        $data['meta_title'] = "Dashbord1";
        return view('welcome', $data);
    }
   
}
