<?php

namespace App\Http\Controllers\api;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AllDataApiController extends Controller
{
    public function index(Request $request)
    {


           $grades = Grade::with('classes.Section.lessons')->get();
        //    parent::success('All Grade Done', ['grades' => $grades], true);
            return response()->json([
            'message'=> 'all grade done',
            'status' => true ,
            'Grades' => $grades,
            ]);

    }

}
