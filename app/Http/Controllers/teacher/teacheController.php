<?php

namespace App\Http\Controllers\teacher;

use Exception;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use Illuminate\Support\Facades\Hash;

class teacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Admin::where('nametype', 'teacher')->get();
      return view('admin.pages.Teachers.Teachers',compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Teachers.create');

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
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'nametype' => 'required',
            ]);
            $type = 'admin';
            $admins = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'nametype' =>  $request->nametype,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Teachers.index');


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
        $Teachers = Teacher::findOrFail($id);

        return view('admin.pages.Teachers.edit',compact('Teachers'));
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
        $Admin = Admin::findOrFail($request->id);
        $Admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nametype' => $request->nametype,

        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('Teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Teacher::findOrFail($request->id)->delete();
          toastr()->error(trans('messages.Delete'));
          return redirect()->route('Teachers.index');
    }
}
