<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(){
        $users = DB::select('select * from users');
        return view('users', ['users'=>$users]);
    }
}
