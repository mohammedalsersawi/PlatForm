<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class lessonApiController extends Controller
{

    public function index(Request $request)
    {



        return response()->json([
        'message'=> 'all grade done',
        'status' => true ,
        'date' =>  [
        'Section' => Lesson::all(),
        ],
        ]);

    }
}
