<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function allTeam(){
        return view('backend.team.index');
    }

    public function addTeam(){
        return view('backend.team.create');
    }
}
