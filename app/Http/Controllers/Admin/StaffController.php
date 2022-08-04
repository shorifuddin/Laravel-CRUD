<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add()
    {
        return view('backend.user.adduser');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'username' => 'required|unique:Staff|max:255',
            'email' => 'required|unique:Staff|max:255',
            'datebirth' => 'required|max:255',
            'gender' => 'required|max:255',
            'skill' => 'required|max:255',
            'category' => 'required|max:255',
            'about' => 'required|max:255',
            'image' => 'required|max:255',
        ]);

        // return $request;
        $image_name = '';
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = time() . '_' . rand(100000, 10000000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(720, 720)->save('upload/staff/' . $image_name);
        }

        // if($request->file('multi_image')){
        //     $gallerys = $request->file('multi_image');
        //     foreach($gallerys as $gallery){
        //         $gallery_name = 'pro' . '_' . rand(100000, 10000000) . '.' . $gallery->getClientOriginalExtension();
        //         Image::make($gallery)->resize(720, 720)->save('upload/staff/' . $gallery_name);
        //         $data[] = $gallery_name;
        //     }
        // }
        // else{
        //     $data[] = '';
        // }

        // return $request;

        $insert = Staff::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
            'email' => $request->email,
            'datebirth' => date('Y-m-d H:i:s', strtotime($request['datebirth'])),
            'country' => $request->country,
            'gender' => $request->gender,
            'skill' => implode(',',$request->skill),
            'category' => $request->category,
            'about' => $request->about,
            'image' => $image_name,
            // 'multi_image' => implode(',', $data),
            'slug' => uniqid(),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert)
        {
            Session::flash('success','Value');
            return redirect()->route('alluser');
        }
        Session::flash('error','Value');
        return redirect()->back();


    }

    public function all()
    {

        $alldata = Staff::where('status',1)->orderBy('staff_id','DESC')->get();
        return view('backend.user.alluser',compact('alldata'));
    }

    public function view(Staff $key)
    {
        dd($key);
        // $data=Staff::where('staff_id',$id)->firstOrFail();
        return view('backend.user.viewuser',compact('data'));
    }

    public function edit($id)
    {
        $data=Staff::where('staff_id',$id)->firstOrFail();
         return view('backend.user.edituser',compact('data'));
    }

    public function update(Request $request, $id )
    {
        // return $request;
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'username' => 'required|unique:Staff|max:255',
            'email' => 'required|unique:Staff|max:255',
            'datebirth' => 'required|max:255',
            'gender' => 'required|max:255',
            'skill' => 'required|max:255',
            'category' => 'required|max:255',
            'about' => 'required|max:255',
        ]);

        $updatestaff = Staff::where('staff_id', $id)->first();

        $image_name = $updatestaff->image;
        if ($request->hasFile('image'))
        {
            if (File::exists('upload/staff/'.$updatestaff->image)) {
                File::delete('upload/staff/'.$updatestaff->image);
            }
            $image = $request->file('image');
            $image_name = time() . '_' . rand(100000, 10000000) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(720, 720)->save('upload/staff/' . $image_name);
        }

        $update=Staff::where('status',1)->where('staff_id',$id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'username' => $request->username,
            'email' => $request->email,
            'datebirth' => date('Y-m-d H:i:s', strtotime($request['datebirth'])),
            'country' => $request->country,
            'gender' => $request->gender,
            'skill' => implode(',',$request->skill),
            'category' => $request->category,
            'about' => $request->about,
            'image' => $image_name,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('alluser');
        }
            Session::flash('error','Value');
            return redirect('/dashboard/user/edit/'.$id);

    }

    public function softdelete($id)
    {
        $softdelete=Staff::where('status',1)->where('staff_id',$id)->update([
            'status'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect()->route('alluser');
        }
            Session::flash('error','Value');
            return redirect()->route('alluser');

    }

    public function restoredata()
    {
        $alldata=Staff::where('status',0)->orderBy('staff_id','ASC')->get();
        return view('backend.user.restore',compact('alldata'));
    }

    public function restore($id)
    {
        $restore=Staff::where('status',0)->where('staff_id',$id)->update([
            'status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect()->route('alluser');
        }
            Session::flash('error','Value');
            return redirect()->route('restoreuser');

    }

    public function delete($id)
    {
        $delete=Staff::where('status',0)->where('staff_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect()->route('alluser');
        }
            Session::flash('error','Value');
            return redirect()->route('restoreuser');

    }

}
