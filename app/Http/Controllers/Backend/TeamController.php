<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\Team;


class TeamController extends Controller
{
    public function allTeam(){
        $team= Team::latest()->get(); 
        return view('backend.team.index', compact('team'));
    }

    public function addTeam(){
        return view('backend.team.create');
    }

    public function editTeam($id){
        $team =Team::findOrFail($id);
        return view('backend.team.edit', compact('team'));
    }

    public function storeTeam(Request $request){
        if($request->file('image')){
            $file =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(550, 670)->save('upload/team/'.$name_gen);
            $save_url='upload/team/'.$name_gen;
            Team::insert([
                'name'=> $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'pinterest' => $request->pinterest,
                'image'=>  $save_url,
                'created_at'=> Carbon::now()
            ]);
        }
        
        

        $notification = array(
            'message' => 'Team is Added Successfully',
            'alert-type' =>'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function updateTeam(Request $request){
        $team_id=$request->id;

        if($request->file('image')){
            $file =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(550, 670)->save('upload/team/'.$name_gen);
            $save_url='upload/team/'.$name_gen;
            Team::findOrFail($team_id)->update([
                'name'=> $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'pinterest' => $request->pinterest,
                'image'=>  $save_url,
                'created_at'=> Carbon::now()
            ]);

            $notification = array(
                'message' => 'Team is Updated Successfully with Image',
                'alert-type' =>'success'
            );
    
            return redirect()->route('all.team')->with($notification);
        }else{
            Team::findOrFail($team_id)->update([
                'name'=> $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'pinterest' => $request->pinterest,
                'created_at'=> Carbon::now()
            ]);

            $notification = array(
                'message' => 'Team is Updated Successfully without Image',
                'alert-type' =>'success'
            );
    
            return redirect()->route('all.team')->with($notification);
        }

    }

    public function deleteTeam($id){
        $team =Team::findOrFail($id);
        $img=$team->image;
        unlink($img);

        $team->delete(); 
        $notification = array(
            'message' => 'Team is Successfully Deleted',
            'alert-type' =>'danger'
        );

        return redirect()->route('all.team')->with($notification);
    }
}
