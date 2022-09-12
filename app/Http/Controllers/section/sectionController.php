<?php

namespace App\Http\Controllers\section;

use App\Models\Unit;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Models\Material;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;

class sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $Sections = Section::all();

        return view('admin.pages.Sections.Sections', compact('Sections'));
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
    public function store(StoreSections $request)
    {
        try {

            $Sections = new Section();
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Name_Material = $request->Name_Material;
            $Sections->Status = 1;
            $Sections->save();
            $Sections->teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));

            return redirect()->route('Sections.index');
        }

        catch (\Exception $e){
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
    public function update(StoreSections $request, $id)
    {
        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->Name_Material = $request->Name_Material;
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            if(isset($request->Status)) {
              $Sections->Status = 1;
            } else {
              $Sections->Status = 2;
            }
            $Sections->save();
            toastr()->success(trans('messages.Update'));

            return redirect()->route('Sections.index');
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
       Section::findOrFail($request->id)->delete();
       toastr()->error(trans('messages.Delete'));
       return redirect()->route('Sections.index');
    }

    // public function getclasses($id)
    // {
    //     $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

    //     return $list_classes;
    // }
}
