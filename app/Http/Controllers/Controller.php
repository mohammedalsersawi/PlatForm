<?php

namespace App\Http\Controllers;

use App\Models\Platformdata;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use SebastianBergmann\CodeUnit\FunctionUnit;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message='', $data=[], $status_code=200)
    {
        return response()->json([
            'message'=> $message,
            'status' => $status_code,
            'Grades' => $data,
        ]);

    }

    public function error($message='Something Went Wrong!', $data=[], $status_code=400)
    {
        return response()->json([
            'message'=> $message,
            'status' => $status_code,
            'Grades' => $data,
        ]);

    }




}
