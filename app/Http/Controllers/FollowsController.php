<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{

    //middleware will stop to go to create post until being logged in
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(User $user){

        return auth()->user()->following()->toggle($user->profile);

    }
}
