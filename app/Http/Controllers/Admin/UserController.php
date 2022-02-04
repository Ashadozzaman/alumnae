<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Year;
use Intervention\Image\Facades\Image;
use App\Models\Tiket;
use File;
use Response;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::where('role_id',3)->get();
        return view('admin.user.user-list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user']  = User::findOrFail($id);
        return view('admin.user.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user']  = User::findOrFail($id);
        $data['years'] = Year::get();
        return view('admin.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        }
        if ($request->password) {
            $data['password']  = Hash::make($request->password);
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
        return redirect()->route('users.index')->with('success','User Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user  = User::findOrFail($id);

        $path=public_path().'/images/user/'.$user->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $user->delete();
        return redirect()->route('users.index')->with('success','User Delete Successfully!!');
    }
    public function tiket_generate($id){

        $user  = User::findOrFail($id);
        ini_set('memory_limit', '-1');
        $img = Image::make(public_path('images/tikets/primary_tiket.png')); 
        $name =  'Name: '.$user->full_name;
        $year =  'Passing Year: '.$user->passing_year;
        $phone_number =  'Phone Number: 0'.$user->phone_number;
        $img->text($name, 5420, 600, function($font) {  
            $font->file(public_path('assets/admin/fonts/Yagora.ttf'));  
            $font->size(110);  
            $font->color('#500770');  
            $font->align('left');  
            $font->valign('bottom');  
            $font->angle(0);     
        }); 
        $img->text($year, 5420, 1060, function($font) {  
            $font->file(public_path('assets/admin/fonts/Yagora.ttf'));  
            $font->size(110);  
            $font->color('#500770');  
            $font->align('left');  
            $font->valign('bottom');  
            $font->angle(0);  
        }); 
        $img->text($phone_number, 5420, 1485, function($font) {  
            $font->file(public_path('assets/admin/fonts/Yagora.ttf'));  
            $font->size(110);  
            $font->color('#500770');  
            $font->align('left');  
            $font->valign('bottom');  
            $font->angle(0);  
        });   
        $imageName = $user->user_name.time().'_tiket.png';
        $path      = public_path().'/images/tikets/user/'.$imageName;
        $img->save($path);
        return $imageName;
    }


    public function tiket_list(){
        $data['tikets'] = Tiket::ORDERBY('id','DESC')->get();
        return view('admin.user.tiket-list',$data);
    }

    public function tiket_approved($id){
       $tiket = Tiket::findOrFail($id);
       $user  = User::findOrFail($tiket->user_id);
       $image = $this->tiket_generate($tiket->user_id);
       $udata['tiket_status'] = 1;
       $udata['tiket_amount'] = $tiket->amount;
       $tdata['status'] = 1;
       $tdata['tiket_image'] = $image;
       $tiket->update($tdata);
       $user->update($udata);
       return back()->with("success","Tiket Approved");
    }

    public function tiket_download($id){
       $tiket = Tiket::findOrFail($id);
       $image = $tiket->tiket_image;
       $path  = public_path().'/images/tikets/user/'.$image;
       // dd($path);
       return Response::download($path); 
    }
}
