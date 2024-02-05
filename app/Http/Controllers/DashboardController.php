<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){

        return view('dashboard',[
            //'ideas'=>Idea::paginate(10),
            'ideas'=>Idea::orderBy('created_at','DESC')->paginate(5),
        ]);
    }
}
