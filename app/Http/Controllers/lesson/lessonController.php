<?php

namespace App\Http\Controllers\lesson;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Numberlesson;
use App\Models\Section;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Numberlessons = Numberlesson::all();
        $Sections = Section::all();
        $Units = Unit::all();
        $lessons = Lesson::all();


        return view('admin.pages.lesson.index' , compact('Numberlessons' , 'Sections' , 'Units' , 'lessons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Number_lesson' => 'required',
            'Section_id' => 'required',
            'Name_Unit' => 'required',
            'Name_lesson' => 'required',
            'Not' => 'required',
            'Not_solve' => 'nullable',
            'Testlinke' => 'nullable',
            'video' => 'required',

        ]);

         // upload Not
         $Notname = 'Not_' . rand() . '_' . $request->file('Not')->getClientOriginalName();
         $request->file('Not')->move(public_path('uploads/Not'), $Notname);


         // upload Not_solvename
        $Not_solvename = 'Not_solve_' . rand() . '_' . $request->file('Not_solve')->getClientOriginalName();
        $request->file('Not_solve')->move(public_path('uploads/Not_solve'), $Not_solvename);



         // upload image
         $videoname = 'video_' . time() . '_' . $request->file('video')->getClientOriginalName();
         $request->file('video')->move(public_path('uploads/video'), $videoname);


         $lesson =  lesson::create([
            'Number_lesson' =>$request->Number_lesson,
            'Section_id' => $request->Section_id,
            'Name_Unit' => $request->Name_Unit,
            'Name_lesson' => $request->Name_lesson,
            'Not'   => $Notname,
            'Not_solve' => $Not_solvename,
            'Testlinke' => $request->Testlinke,
            'video' => $videoname,
         ]);

         toastr()->success(trans('messages.success'));
         return redirect()->route('lesson.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
    {

        $lessons = Lesson::findorFail($request->id);
        $Not = $lessons->Not;
        $Not_solve = $lessons->Not_solve;
        $video = $lessons->video;

        if ($request->hasFile('Not')) {
            File::delete(public_path('uploads/Not/' . $lessons->Notname));
            $Notnamenew = 'Not_' . rand() . '_' . $request->file('Not')->getClientOriginalName();
        } else {
        }

        if ($request->hasFile('Not_solve')) {
            File::delete(public_path('uploads/Not_solve/' . $lessons->Not_solvename));
            $Notsolvename = 'Not_solve_' . rand() . '_' . $request->file('Not_solve')->getClientOriginalName();
        } else {
        }

        if ($request->hasFile('video')) {
            File::delete(public_path('uploads/Not/' . $lessons->videoname));
            $videonamenew = 'video_' . rand() . '_' . $request->file('video')->getClientOriginalName();
        } else {
        }

        $lessons->update([
            'Number_lesson' => $request->Number_lesson,
            'Section_id' => $request->Section_id,
            'Name_Unit' => $request->Name_Unit,
            'Name_lesson' => $request->Name_lesson,
            'Testlinke' => $request->Testlinke,
            'Not' =>  $Notnamenew,
            'Not_solve' => $Notsolvename,
            'video' => $videonamenew,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('lesson.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       $lessons = Lesson::findOrFail($request->id);
        File::delete(public_path('uploads/Not/' . $lessons->Not));
        File::delete(public_path('uploads/Not_solve/' . $lessons->Not_solve));
        File::delete(public_path('uploads/video/' . $lessons->video));

       $lessons->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('lesson.index');
    }
}
