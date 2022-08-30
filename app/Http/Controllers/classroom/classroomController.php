<?php

namespace App\Http\Controllers\classroom;

use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;

class classroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('admin.pages.My_Classes.My_Classes' ,compact('My_Classes' , 'Grades'));
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
    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes;


        try
        {
            $validated = $request->validated();
            foreach ($List_Classes as $List_Class)
            {
                $My_Classes = new Classroom();
                $My_Classes->Name_Class = $List_Class['Name_Class'];
                $My_Classes->Grade_id = $List_Class['Grade_id'];

                $My_Classes->save();

            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');

        }
        catch (\Exception $e)
        {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }
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
        try {

            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->Name_Class = $request->Name_Class,
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    // public function Filter_Classes(Request $request)
    // {
    //    // return view('auth.login');
    //     $Grades = Grade::all();
    //     $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
    //     return view('pages.My_Classes.My_Classes',compact('Grades'))->with($Search);

    // }
}

