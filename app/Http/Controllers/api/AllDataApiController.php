<?php

namespace App\Http\Controllers\api;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Platformdata;
use App\Models\User;

class AllDataApiController extends Controller
{
    public function index(Request $request)
    {

        $Platformdata =  Platformdata::all();
            return response()->json([
            'message'=> 'allPlatformdata',
            'status' => true ,
            'date' => $Platformdata,
            ]);

    }

}
