<?php

namespace App\Http\Controllers;

use App\Models\Recruiters;
use Illuminate\Http\Request;

class RecruitersController extends Controller
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
    public function show( $recruiter)
    {
        $profile = Recruiters::find($recruiter);

        return view('recruiters.view_profile',compact('profile'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $recruiter)
    {
        $recruiters=  Recruiters::find( $recruiter);
        return view('recruiters.edit', compact('recruiters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $recruiter)
    {
       $data = $request->validate([
            'address' => 'required|string',
            'desc' => 'required|string',
            'phone' => 'required|string',
            'sub_title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image field
        ]);
        $recruiters =  Recruiters::find($recruiter);
        // Upload new image if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($recruiters->image && file_exists(public_path('images/' . $recruiters->image))) {
                unlink(public_path('images/' . $recruiters->image));
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
            $request->merge(['image' => $imageName]);
            $data['image'] = $imageName;
        }

        $recruiters->update($data);
        if(Auth()->user()->role =='admin'){
            $recruiters->user->status = $request->status;
            $recruiters->user->save();
        }
        return redirect()->back()->with('success', 'Detail updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recruiters $recruiters)
    {
        //
    }
}
