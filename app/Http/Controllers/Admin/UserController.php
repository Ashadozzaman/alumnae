<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Year;

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
            'email' => ['string', 'email', 'max:255'],
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
        //
    }
}
