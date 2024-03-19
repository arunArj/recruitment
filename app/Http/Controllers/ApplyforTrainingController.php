<?php

namespace App\Http\Controllers;

use App\Models\ApplyforTraining;
use Illuminate\Http\Request;

class ApplyforTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ApplyforTraining::where('training_id');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ApplyforTraining $applyforTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplyforTraining $applyforTraining)
    {
        //
    }


    public function getStudentsApplied($id)
    {
        $appliedList = ApplyforTraining::where('training_id',$id)->get();
        return view('training_models.applied_list',compact('appliedList'));

    }
    public function studentList($id){

         $training = ApplyforTraining::where('user_id',$id)->paginate(10);
        return view('students.applied_training_index',compact('training'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);
        $training = ApplyforTraining::find($id);
        $training->status = $data['status'];
        $training->Save();
        return redirect()->back()->with('success','Status updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $record = ApplyforTraining::find($id);
        $record->delete();
        return redirect()->back()->with('success','Record removed');
    }
}
