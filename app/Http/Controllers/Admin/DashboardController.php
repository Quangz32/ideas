<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        // if (!Gate::allows('admin')){
        //     abort(403);
        // }

        //$this->authorize('admin');

        //{in Route files, can:admin}
        return view('admin.dashboard');
    }
}
