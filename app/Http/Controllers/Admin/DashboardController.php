<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
	    $active_user_id = 0;
	    $active_user = User::find($active_user_id);
    	return view('admin.dashboard', compact('active_user'));
    }
}
