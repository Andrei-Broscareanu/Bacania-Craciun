<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUserController extends Controller
{
    public function show(User $user)
    {
        $orders = $user->orders()->get();
        return response()
            ->view('admin.users.show', [
                'user' => $user,
                'orders'=>$orders,
            ]);
    }

    public function index()
    {
        $users = User::paginate(10);

        return response()
            ->view('admin.users.index', [
                'users' => $users
            ]);
    }
}
