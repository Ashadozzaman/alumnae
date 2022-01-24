<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Notice;

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
        return view('home.home');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function notices()
    {
        $data['notices'] = Notice::ORDERBY('id','desc')->paginate(3);
        return view('home.notice',$data);
    }
    public function alumnae()
    {
        $users = User::select('passing_year')->groupBy('passing_year')->get()->toArray();
        $users_array = [];
        foreach ($users as $key => $value) {
            $users_array[$key]['passing_year'] = $value['passing_year'];
            $users_year_wise = User::where('role_id',3)->where('passing_year',$value['passing_year'])->get();
            $users_array[ $key]['users_year_wise'] = $users_year_wise;
        }
        $data['users_array'] = $users_array;
           // dd($data);
        return view('home.alumnae',$data);
    }
    public function message_send(Request $request){
        $data = $request->except('_token');
        if (Auth::check()) {
            $data['user_id'] = auth()->user()->id;
        }
        Contact::create($data);
        return redirect()->route('contact')->with('success','Your message has been sent. Thank you!');
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
    }

}
