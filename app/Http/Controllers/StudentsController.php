<?php

namespace App\Http\Controllers;

use App\Models\JobListings;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course' => 'required',
            'dob' => 'required|date',
            'percentage' => 'required|numeric',
            'no_of_backlog' => 'required|integer',
            'address' => 'required',
            'mobile' => 'required',
        ]);

        Students::create($request->all());

        return redirect()->route('students.index')
                         ->with('success','Student created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($student)
    {

        $student =Students::find($student);
        return view('students.student_edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $student)
    {
        // Validate the request
        $request->validate([
            'course' => 'required',
            'dob' => 'required|date',
            'percentage' => 'required|numeric',
            'no_of_backlog' => 'required|integer',
            'address' => 'required',
            'mobile' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
            'resume' => 'file|mimes:pdf,doc|max:2048', // Validate resume file

        ]);
        $student =  Students::find($student);
       $data = [
        'course' => $request->course,
        'dob' => $request->dob,
        'percentage' => $request->percentage,
        'no_of_backlog' => $request->no_of_backlog,
        'address' => $request->address,
        'mobile' => $request->mobile,
       ];

        $student->update();
        if(Auth()->user()->role =='admin'){
            $student->user->status = $request->status;
            $student->user->save();
        }
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($student->image && file_exists(public_path('images/' . $student->image))) {
                unlink(public_path('images/' . $student->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $request->merge(['image' => $imageName]);
            $student->image = $imageName;
            $student->save();
        }


        // Handle resume update if provided
        if ($request->hasFile('resume')) {
            $image = $request->file('resume');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('pdf'), $imageName);
            $request->merge(['image' => $imageName]);
            $student->resume = $imageName;
            $student->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student record updated successfully.');
    }

    public function jobListing(){
        $jobs = JobListings::where('status',1)->get();
        return view('students.job_listing',compact('jobs'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        //
    }
}
