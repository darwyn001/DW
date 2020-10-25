<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        $users = DB::select('select u.id , u.name , u.documentId carnet, u.email, r.description rol
                                   from users u, roles r
                                   where u.roleId = r.id;');
        return view('users', ['users'=>$users]);
    }
}
