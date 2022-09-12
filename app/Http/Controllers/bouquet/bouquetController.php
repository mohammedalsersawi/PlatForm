<?php

namespace App\Http\Controllers\bouquet;

use App\Http\Controllers\Controller;
use App\Models\Bouquet;
use Illuminate\Http\Request;

class bouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bouquets = Bouquet::all();
        return view('admin.pages.bouquet.bouquets' , compact('bouquets'));
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
            'num_section' => 'required',
            'Duration' => 'required',
            'price' => 'required',
            'date' => 'required',

        ]);

        $Bouquet =  Bouquet::create([


            'num_section' => $request->num_section,
            'Duration' => $request->Duration,
            'price' => $request->price,
            'date' => $request->date,


        ]);

        toastr()->success(trans('messages.success'));
        return redirect()->route('bouquets.index');
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
        $request->validate([
            'num_section' => 'required',
            'Duration' => 'required',
            'price' => 'required',
            'date' => 'required',

        ]);
        $Bouquet = Bouquet::findOrFail($request->id);

        $Bouquet->update([
            'num_section' => $request->num_section,
            'Duration' => $request->Duration,
            'price' => $request->price,
            'date' => $request->date,

            ]);



        toastr()->success(trans('messages.success'));
        return redirect()->route('bouquets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $Bouquet = Bouquet::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('bouquets.index');
    }
}
