<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\User;

class UserListController extends Controller
{
    public function list(){
        $data_user = User::paginate(5);

        return view('admin.user-list')
        ->with('data_user',$data_user);
    }
}
