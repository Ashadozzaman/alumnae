<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tiket;
use App\Models\Year;
use File;
use Response;

class DashboardController extends Controller
{
    public function index(){
        return view('home.home');
    }

    public function profile($id){
        if ($id != auth()->user()->id) {
            return back();
        }
        $data['user'] = User::findOrFail($id);
        $data['years'] = Year::get();
        return view('home.profile',$data);

    }
    public  function profile_update(Request $request,$id){
        
        $user  = User::findOrFail($id);
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'permanent_address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'passing_year' => ['required', 'string', 'max:255'],
            'password' => ['confirmed'],
        ]);
        if ($request->file('image')) {
            $image     = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $path = public_path('/images/user');
            $image->move($path,$imageName);
            $data['image'] = $imageName;
            
            $path=public_path().'/images/user/'.$user->image;
            if (file_exists($path) && $user->image != null) {
                unlink($path);
            }
        }
        $data['full_name'] = $request->full_name;
        $data['user_name'] = $request->user_name;
        $data['email']     = $request->email;
        $data['permanent_address'] = $request->permanent_address;
        $data['phone_number']      = $request->phone_number;
        $data['passing_year']      = $request->passing_year;
        $data['permanent_address'] = $request->permanent_address;
        $data['current_address']   = $request->current_address;
        $data['bio']               = $request->bio;
        $data['designation']       = $request->designation;
        $data['last_institution']  = $request->last_institution;
        $data['current_job_place'] = $request->current_job_place;
        $data['last_degree']       = $request->last_degree;
        User::where('id',$id)->update($data);
        return redirect()->back()->with('success','Profile Update Successfully!!');
    }

    public function get_tiket(){
        $data['tiket'] = Tiket::where('user_id',auth()->user()->id)->first();
        return view('home.get_tiket',$data);
    }

    public function tiket_submit(Request $request){
        $data = $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['date'] = date('Y-m-d');
        Tiket::create($data);
        return redirect()->back()->with('success','User tiket payment send successfully');
    }

    public function tiket_download($id){
       $tiket = Tiket::findOrFail($id);
       $image = $tiket->tiket_image;
       $path  = public_path().'/images/tikets/user/'.$image;
       // dd($path);
       return Response::download($path); 
    }
}
