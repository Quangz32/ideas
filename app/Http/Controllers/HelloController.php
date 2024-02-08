<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        $users = [
            [
                'name'=> 'Quangz',
                'age'=>'21',
            ],
            [
                'name'=> 'Phuong',
                'age'=>'20',
            ],
        ];

        return view('listUser',[
            'users' => $users,
        ]);
    }

}
