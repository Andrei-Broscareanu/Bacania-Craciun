<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $currentUserCount = User::where('created_at' , '>=' , Carbon::now()->startOfDay())->count();
        return view('admin.index',compact('currentUserCount'));
    }
}
