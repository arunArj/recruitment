<?php

namespace App\Http\Controllers;

use App\Mail\SendNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function dashboard()
    {

        if(Auth()->user()->role == 'admin'){
            return redirect()->route('users');
        }
        if(Auth()->user()->role == 'recruiter'){
            return redirect()->route('job-listing');
        }
        if(Auth()->user()->role == 'student'){
            $studentId = Auth()->user()->student->id;
            return redirect()->to('/students/'. $studentId.'/edit');
        }
    }
    public function usersList()
    {
        $users = User::all();
        return view('users.user_list',compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,student,recruiter', // Assuming role can be either 'admin' or 'user'

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        if($user->role =='student'){
            $user->student()->create();
        }
        if($user->role =='recruiter'){
            $user->recruiter()->create();
        }
        $content = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $request->password,
            'url' => 'http://127.0.0.1:8000/',
        ];

        Mail::to($user->email)->send(new SendNotification($content));
        return redirect()->back()->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

            // $content = [
            //     'name' => 'Arjun',
            //     'email' => 'arun@gmail.com',
            //     'password' => '12345678',
            //     'url' => 'http://127.0.0.1:8000/',
            //     'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
            // ];

            // Mail::to('arunraj99675@gmail.com')->send(new SendNotification($content));

            // return "Email has been sent.";

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user->id == Auth()->user()->id){
            return redirect()->back()->with('error','Cannot delete your own record');
        }
        $user->delete();
        return redirect()->back()->with('success','Record Deleted');
    }
}
