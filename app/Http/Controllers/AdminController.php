<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function adminLogin(){
        return view('admin.admin_login');
    }
}
