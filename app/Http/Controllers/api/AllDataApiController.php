<?php

namespace App\Http\Controllers\api;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllDataApiController extends Controller
{
    public function index(Request $request)
    {


           $grades = Grade::with('classes.Section.lessons')->get();
            return response()->json([
            'message'=> 'all grade done',
            'status' => true ,
            'Grades' => $grades,
            ]);

    }
}
