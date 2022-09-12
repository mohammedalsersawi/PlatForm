<?php

namespace App\Http\Controllers\lesson;

use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Classroom;
use App\Models\Numberlesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberlessons = Numberlesson::all();
        $Sections = Section::all();
        $Units = Unit::all();
        $lessons = Lesson::all();
        $clasess = Classroom::all();


        return view(
            'admin.pages.lesson.index',
            compact(
                'numberlessons',
                'clasess',
                'Sections',
                'Units',
                'lessons'
            )
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $numberlessons = Numberlesson::all();
        $Sections = Section::all();
        $Units = Unit::all();
        $lessons = Lesson::all();
        $clasess = Classroom::all();
        return view(
            'admin.pages.lesson.create',
            compact(
                'numberlessons',
                'clasess',
                'Sections',
                'Units',
                'lessons'
            )
        );
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
            'name_lesson' => 'required',
            'section_id' => 'required',
            'name_Unit' => 'required',
            'number_lesson' => 'required',
            'testlinke' => 'nullable',
            'not' => 'required',
            'not_solve' => 'nullable',
            'video' => 'required',

        ]);


        if ($image = $request->file('not')) {
            $destinationPath = 'uploads/not';
            $profileImage = 'Not_solve_' . Str::random(30) . '_' . $request->file('not')->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $request['not'] = "$profileImage";
        } else {
            $profileImage = null;
        }
        if ($image = $request->file('not_solve')) {
            $destinationPath = 'uploads/Not_solve';
            $notsolvename = 'Not_solve_' . Str::random(30) . '_' . $request->file('not_solve')->getClientOriginalName();
            $image->move($destinationPath, $notsolvename);
            $request['not_solve'] = "$notsolvename";
        } else {
            $notsolvename = null;
        }
        if ($image = $request->file('video')) {
            $destinationPath = 'uploads/video';
            $videoname = 'video_' . time() . '_' . $request->file('video')->getClientOriginalName();
            $image->move($destinationPath, $videoname);
            $request['not'] = "$videoname";
        } else {
            $videoname = null;
        }

        $lesson =  lesson::create([
            'number_lesson' => $request->number_lesson,
            'section_id' => $request->section_id,
            'clases_id' => $request->clases_id,
            'name_Unit' => $request->name_Unit,
            'name_lesson' => $request->name_lesson,
            'testlinke' => $request->testlinke,
            'not'   => $profileImage,
            'not_solve'   => $notsolvename,
            'video'   => $videoname,

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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {



        $request->validate([
            'name_lesson' => 'required',
            'section_id' => 'required',
            'name_Unit' => 'required',
            'number_lesson' => 'required',
            'testlinke' => 'nullable',
            'not' => 'nullable',
            'not_solve' => 'nullable',
            'video' => 'nullable',

        ]);
        $lessons = Lesson::findOrFail($request->id);





        if ($not = $request->file('not')) {

            File::delete(public_path('uploads/not/' . $lessons->not));
            $destinationPath = 'uploads/not/';
            $lessons->not = Str::random(30). "." . $not->getClientOriginalExtension();
            $not->move($destinationPath, $lessons->not);
        }



        if ($not_solve = $request->file('not_solve')) {
            File::delete(public_path('uploads/Not_solve/' . $lessons->not_solve));
            $destinationPath = 'uploads/Not_solve/';
             $lessons->not_solve = Str::random(30) . "." . $not_solve->getClientOriginalExtension();
            $not_solve->move($destinationPath,  $lessons->not_solve);
        }

        if ($video = $request->file('video')) {
            File::delete(public_path('uploads/video/' . $lessons->video));
            $destinationPath = 'uploads/video/';
            $lessons->video = Str::random(30) . "." . $video->getClientOriginalExtension();
            $video->move($destinationPath, $lessons->video);
        }


        $lessons->save();
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
        File::delete(public_path('uploads/not/' . $lessons->not));
        File::delete(public_path('uploads/Not_solve/' . $lessons->not_solve));
        File::delete(public_path('uploads/video/' . $lessons->video));

        $lessons->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('lesson.index');
    }
}
