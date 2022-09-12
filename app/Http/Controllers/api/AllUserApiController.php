<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllUserApiController extends Controller
{
    public function index(Request $request)
    {


           $users = User::all();
            return response()->json([
            'message'=> 'all grade done',
            'status' => true ,
            'users' => $users,
            ]);

    }
}
