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
}
