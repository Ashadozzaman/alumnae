<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function alumnae_login(){
        return view('auth.alumnae_login');
    }
    public function alumnae_signup(){
        // for ($i=1972; $i < 2023 ; $i++) { 
        //     $data['year'] = $i;
        //     Year::create($data);
        // }

        $data['years'] = Year::get();
        return view('auth.alumnae_signup',$data);
        return view('auth.alumnae_signup');
    }

}
