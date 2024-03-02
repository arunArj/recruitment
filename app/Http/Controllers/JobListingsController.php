<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use Illuminate\Http\Request;

class JobListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobListings = JobListings::where('recruiter_id',Auth()->user()->recruiter->id)->paginate(10);
        return view('job_listings.job_index', compact('jobListings'));
    }
    public function adminJobList()
    {
        $jobListings = JobListings::paginate(10);
        return view('admin.joblist', compact('jobListings'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('job_listings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth()->user()->status == '0'){
            return redirect()->back()->with('error','Profile Not verified');
        }
      $data =   $request->validate([

            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'percentage' => 'required|numeric',
            'no_of_vacancy' => 'required|integer',
            'supply' => 'required|integer',
        ]);
    $data['recruiter_id'] = Auth()->user()->recruiter->id;
     //  Auth()->user()->recruiter()->job
    JobListings::create($data);
        return redirect()->back()->with('success', 'post submitted successfsully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(JobListings $jobListings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($jobListing)
    {
        $joblistings = JobListings::find($jobListing);
        return view('job_listings.job_edit',compact('joblistings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $jobListing)
    {
        $jobListings = JobListings::find($jobListing);
        $request->validate([

            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'percentage' => 'required|numeric',
            'no_of_vacancy' => 'required|integer',

        ]);
        $jobListings->update($request->all());

        return redirect()->back()->with('success', 'Job listing updated successfully.');


    }
    public function StatusUpdate(Request $request,  $jobListing)
    {

        $jobListings = JobListings::find($jobListing);
        $request->validate([

            'status' => 'required|string|max:255',


        ]);
        $jobListings->update($request->all());

        return redirect()->back()->with('success', 'Status updated successfully.');


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $jobListing)
    {
        $jobListings = JobListings::find($jobListing);
        $jobListings->delete();
        return redirect()->back()->with('success', 'record removed');
    }
}
