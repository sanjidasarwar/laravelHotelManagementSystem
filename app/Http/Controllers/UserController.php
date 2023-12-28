<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        return view('frontend.user.edit_profile', compact('profileDetails'));
    }
    public function userProfileStore(Request $request){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        $profileDetails->name =$request->name;
        $profileDetails->email =$request->email;
        $profileDetails->phone =$request->phone;
        $profileDetails->address =$request->address;

        if($request->file('photo')){
            $file =$request->file('photo');
            // to remove previous image
            @unlink(public_path('upload/user_images/').$profileDetails->photo);

            $fileName=date('YmdHi').$file->getClientOriginalName();

            $file->move(public_path('upload/user_images'), $fileName);

            $profileDetails->photo =$fileName;
        }

        $profileDetails->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
    public function userChangePassword(){
        $id = Auth::user()->id;
        $profileDetails = User::find($id);
        return view('frontend.user.user_change_password', compact('profileDetails'));
    }
    public function userLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
