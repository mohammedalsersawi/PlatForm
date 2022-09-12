<?php

namespace App\Http\Controllers\platformdata;

use App\Models\Platformdata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class platformdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Platformdata::all();
        return view('admin.pages.platformdata.platformdata' , compact('data'));
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
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:platformdatas,mobile,except,id',
        ]);
        $lesson =  Platformdata::create([

            'mobile' => $request->mobile,
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('platformdata.index');
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
        $Platformdata = Platformdata::findorFail($request->id);
        $Platformdata->mobile = $request->mobile;
        $Platformdata->save();
        toastr()->success(trans('messages.success'));
        return redirect()->route('platformdata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $Package = Platformdata::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('platformdata.index');
    }
}
