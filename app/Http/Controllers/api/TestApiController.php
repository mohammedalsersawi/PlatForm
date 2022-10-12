<?php

namespace App\Http\Controllers\api;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Package;
use App\Models\Section;

class TestApiController extends Controller
{
    public function index(Request $request, $user_id)
    {

        $data = Package::with(['sections.lessons'])
            ->where(['user_id' => $user_id , 'Status' =>1])
            ->get();
        return response()->json([
            'message' => 'all grade done',
            'status' => true,
            'DATA' => $data,
        ]);



    }
    public function lessonsbysection(Request $request, $user_id, $section_id)
    {
        $data = Package::with(['sections.lessons'])
            ->where(['user_id' => $user_id, 'section_id' => $section_id])
            ->get();
        return response()->json([
            'message' => 'all grade done',
            'status' => true,
            'DATA' => $data,
        ]);
    }
}
