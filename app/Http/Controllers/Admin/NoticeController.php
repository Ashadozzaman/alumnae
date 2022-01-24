<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['notices'] = Notice::get();
        return view('admin.notice.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        if ($request->file('notice_image')) {
            $image     = $request->file('notice_image');
            $imageName = time().$image->getClientOriginalName();
            $path = public_path('/images/notices/');
            $image->move($path,$imageName);
            $data['notice_image'] = $imageName;
        }
        $data['published_date'] = date('d-M-Y');
        Notice::create($data);
        return redirect()->route('notice.index')->with('success','Notice Create Successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['notice'] = Notice::findOrFail($id);
        return view('admin.notice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notice = Notice::findOrFail($id);
        $data = $request->except(['_token']);
        if ($request->file('notice_image')) {
            $image     = $request->file('notice_image');
            $imageName = time().$image->getClientOriginalName();
            $path = public_path('/images/notices/');
            $image->move($path,$imageName);
            $data['notice_image'] = $imageName;

            $filepath=public_path('/images/notices/'.$notice->notice_image);
            if (file_exists($filepath)) {
                unlink($filepath);
            }
        }
        $notice->update($data);
        return redirect()->route('notice.index')->with('success','Notice Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice  = Notice::findOrFail($id);

        $path=public_path().'/images/notices/'.$notice->notice_image;
        if (file_exists($path)) {
            unlink($path);
        }
        $notice->delete();
        return redirect()->route('notice.index')->with('success','Notice Delete Successfully!!');
    }
}
