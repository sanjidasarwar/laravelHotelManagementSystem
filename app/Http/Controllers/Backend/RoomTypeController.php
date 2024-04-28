<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\RoomType;

class RoomTypeController extends Controller
{
    public function roomTypeList(){
        $roomType=RoomType::orderBy('id', 'desc')->get();
        return view('backend.allroom.roomtype.index', compact('roomType'));
    }
    public function addRoomType(){
        return view('backend.allroom.roomtype.create');
    }

    public function storeRoomType(Request $request){
        RoomType::insert([
            'name' => $request->name
        ]);
        
        $notification = array(
            'message' => 'Room type is Added Successfully',
            'alert-type' =>'success'
        );

        return redirect()->route('room.type.list')->with($notification);
    }
}
