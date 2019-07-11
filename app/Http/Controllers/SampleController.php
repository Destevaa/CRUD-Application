<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Sample::all()->toArray();
        return view('sampleViews.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sampleViews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'     =>  'required',
            'mobile_number'     =>  'required'

        ]);
        $users = new Sample([
            'first_name'    =>  $request->get('first_name'),
            'last_name'     =>  $request->get('last_name'),
            'email'     =>  $request->get('email'),
            'mobile_number'     =>  $request->get('mobile_number')
        ]);
        $users->save();
        return redirect()->route('sampleViews.index')->with('success', 'Data Added');
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
        $users = Sample::find($id);
        return view('sampleViews.edit', compact('users', 'id'));
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
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'     =>  'required',
            'mobile_number'     =>  'required'
        ]);
        $users = Sample::find($id);
        $users->first_name = $request->get('first_name');
        $users->last_name = $request->get('last_name');
        $users->email = $request->get('email');
        $users->mobile_number = $request->get('mobile_number');
        $users->save();
        return redirect()->route('sampleViews.index')->with('success', 'Data Updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Sample::find($id);
        $student->delete();
        return redirect()->route('sampleViews.index')->with('success', 'Data Deleted');
    }
}
