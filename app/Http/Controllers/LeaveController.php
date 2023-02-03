<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id',auth()->user()->id)->get();
        
        return view('admin.leave.create',compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['massage'] = '';
        $data['status'] = 0;
        Leave::create($data);
        return redirect()->back()->with('message','Leave created succesfully');
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
        $leaves = Leave::find($id);
        return view('admin.leave.edit', compact('leaves'));
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
        $this->validate($request,[
            'from' => 'required',
            'to' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);
        $data = $request->all();
        $leaves = Leave::find($id);
        $data['user_id'] = auth()->user()->id;
        $data['massage'] = '';
        $data['status'] = 0;
        $leaves->update($data);
        return redirect()->route('leaves.create')->with('message','Leave Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leaves = Leave::find($id);
        $leaves->delete();
        return redirect()->route('leaves.create')->with('message','Record deleted succesfully');
    }

    public function acceptReject(Request $request, $id){
        $status = $request->status;
        $massage = $request->massage;
        $leaves = Leave::find($id);
        $leaves->update([
            'status' => $status,
            'massage' => $massage
        ]);
        return redirect()->route('leaves.index')->with('message','Confirm success');
    }

   
}
