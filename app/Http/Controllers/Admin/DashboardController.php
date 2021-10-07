<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
       return view('admin.dashboard');
    }

    public function user_list(){
        $data['users'] = User::get();
        return view('admin.user.user-list',$data);
    }
}
