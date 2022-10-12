<?php

namespace App\Http\Controllers\Grade;

use toastr;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradesRequest;
use App\Models\Classroom;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grades = Grade::all();
        return view('admin.pages.grades.Grades' , compact('grades'));
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
    public function store(StoreGradesRequest $request)
    {

        $validated = $request->validated();
        $Grade = new Grade();

        // 'Name' => اسم الحقل في الداتا بيز

          $Grade->Name = $request->Name;
          $Grade->save();
          toastr()->success(trans('messages.success'));
          return redirect()->route('Grades.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function update(StoreGradesRequest $request, $id)
    {
        try
        {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = $request->Name,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
        }
        catch(\Exception $e)
        {
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
        $MyClass_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

        if($MyClass_id->count() == 0){

            $Grades = Grade::findOrFail($request->id)->delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('Grades.index');
        }

        else{

            toastr()->error(trans('Grade_tranc.delete_Grade_Error'));
            return redirect()->route('Grades.index');
    }



}
// private function rules() {
//     return[
//         'Name' => 'required|unique:grades,Name,'.$this->id,
//     ];

//     }

//     private function messages() {
//         return[
//             'Name.required' => trans('validation.required'),
//             'Name.unique' => trans('validation.unique'),
//             'Name_en.required' => trans('validation.required'),
//             'Name_en.unique' => trans('validation.unique'),
//         ];
//}
}
