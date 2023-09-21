<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        $usersPast24h = User::where('created_at' , '>=' , Carbon::now()->startOfDay())->count();
        return view('admin.index',compact('usersPast24h'));
    }
}
