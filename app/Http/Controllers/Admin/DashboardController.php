<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        //there are something in middleware EnsureUserIsAdmin, check it!
        return view('admin.dashboard');
    }
}
