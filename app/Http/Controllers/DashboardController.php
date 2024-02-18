<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC');
        //$ideas = Idea::with('user','comments.user')->orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search') . '%');
        }

        // ideas_count

        //dd($topUsers);
        return view('dashboard', [
            'ideas' => $ideas->paginate(5),
        ]);
    }
}
