<?php

namespace App\Http\Controllers\Package;

use App\Models\Section;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clasess = Classroom::all();
        $Sections = Section::all();
        $users = User::all();
        $Package = Package::all();

        return view('admin.pages.Package.Package' , compact('clasess' , 'Sections' , 'users' ,'Package'));

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
            'user_id' => 'required',
            'clases_id' => 'required',
            'section_id' => 'required',

        ]);

        $lesson =  Package::create([


            'user_id' => $request->user_id,
            'clases_id' => $request->clases_id,
            'section_id' => $request->section_id,


        ]);

        toastr()->success(trans('messages.success'));
        return redirect()->route('Package.index');

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

        $Package = Package::findOrFail($request->id);

        $Package->user_id = $request->user_id;
        $Package->clases_id = $request->clases_id;
        $Package->section_id = $request->section_id;

        if(isset($request->Status)) {
            $Package->Status = 1;
           } else {
            $Package->Status = 0;
           }
          $Package->save();

          toastr()->success(trans('messages.success'));
          return redirect()->route('Package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $Package = Package::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Package.index');
    }
}
