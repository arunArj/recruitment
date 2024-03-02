<?php

namespace App\Http\Controllers;

use App\Models\ApplyJob;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getStudentsApplied($id)
    {
        $appliedList = ApplyJob::where('job_listing_id',$id)->get();
        return view('apply_job.applied_list',compact('appliedList'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        if(Auth()->user()->status == '0'){
            return redirect()->back()->with('error','Profile Not verified');
        }
        $applied = ApplyJob::where(['user_id'=>Auth()->user()->id,'job_listing_id'=>$id])->count();
        if( $applied>0){
            return redirect()->back()->with('error','Already Applied');
        }
        ApplyJob::create([
            'user_id' => Auth()->user()->id,
            'job_listing_id' =>$id,
            'status' =>0,
        ]);
        return redirect()->back()->with('success','Successfully Applied');
    }

    public function getUserJobs(){
        $applied = ApplyJob::where(['user_id'=>Auth()->user()->id])->get();
        return view('apply_job.index',compact('applied'));
    }
    /**
     * Display the specified resource.
     */
    public function show(ApplyJob $applyJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApplyJob $applyJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $applyJob)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);
        $job = ApplyJob::find($applyJob);
        $job->status = $data['status'];
        $job->Save();
        return redirect()->back()->with('success','Status updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $applyJob)
    {
        $applyJob =  ApplyJob::find($applyJob);
        $applyJob->delete();
        return redirect()->back()->with('success','application removed successfully');
    }
}
