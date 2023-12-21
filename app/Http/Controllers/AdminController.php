<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.index');
    }
    
    public function adminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function adminProfile(){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        return view('admin.admin_profile', compact('profileDetails'));
    }

    public function adminProfileStore(Request $request){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        $profileDetails->name =$request->name;
        $profileDetails->email =$request->email;
        $profileDetails->phone =$request->phone;
        $profileDetails->address =$request->address;

        if($request->file('photo')){
            $file =$request->file('photo');
            // to remove previous image
            @unlink(public_path('upload/admin_images/').$profileDetails->photo);

            $fileName=date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/admin_images'), $fileName);

            $profileDetails->photo =$fileName;
        }

        $profileDetails->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }

    public function adminChangePassword(){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        return view('admin.admin_change_password', compact('profileDetails'));
    }

    public function adminPasswordUpdate(Request $request){
        // dd($request->old_password);          

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required ',
            'confirm_password' => 'required | same:new_password'
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){          

            $notification = array(
                'message' => 'Old Password Does not Match',
                'alert-type' =>'error'
            );
    
            return back()->with($notification);
        }

        //  update new password
              User::whereId(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' =>'success'
            );

            return back()->with($notification);
       
    }

    public function adminLogin(){
        return view('admin.admin_login');
    }
}
