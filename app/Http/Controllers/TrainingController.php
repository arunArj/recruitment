<?php

namespace App\Http\Controllers;

use App\Models\ApplyforTraining;
use App\Models\Training;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
    public function index()
    {
        $training = Training::paginate(10);
        return view('training_models.index', compact('training'));
    }
    public function create(){
        return view('training_models.create');
    }
    public function edit($id)
    {
        // Retrieve the training model with the given ID
        $training = Training::findOrFail($id);

        // Pass the training model data to the view for editing
        return view('training_models.edit', compact('training'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'type' => 'required|string',
            'topic' => 'required|string',
            'duration' => 'required|string',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:start',
        ]);

        // Create a new TrainingModel instance
        Auth()->user()->training()->create([
            'type' => $request->type,
            'topic' => $request->topic,
            'duration' => $request->duration,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        // Redirect back to the index page with a success message
        return redirect()->route('training.index')->with('success', 'Record created successfully.');
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'type' => 'required|string',
            'topic' => 'required|string',
            'duration' => 'required|string',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:start',
        ]);

        // Find the training model with the given ID
        $training = Training::findOrFail($id);

        // Update the training model with the new data
        $training->update([
            'type' => $request->type,
            'topic' => $request->topic,
            'duration' => $request->duration,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('training.index')->with('success', 'Training model updated successfully.');
    }
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return redirect()->route('training.index')->with('success', 'Training program deleted successfully.');
    }
    public function applyTraining($id){
        if(Auth()->user()->status == '0'){
            return redirect()->back()->with('error','Profile Not verified');
        }
        $training = Training::findOrFail($id);
        $today = Carbon::today();
    $start_date = Carbon::createFromFormat('Y-m-d', $training->start);
        if ( $start_date->lessThan($today)) {
            return redirect()->back()->with('error', 'Training has already started.');
        }
        $applied = ApplyforTraining::where(['user_id'=>Auth()->user()->id,'training_id'=>$id])->count();
        if( $applied>0){
            return redirect()->back()->with('error','Already Applied');
        }
        Auth()->user()->applyForTraining()->create([
            'training_id' =>$id,
        ]);
        return redirect()->route('training.index')->with('success', 'Applied successfully.');
    }

    public function resume(){
        $data = ['title' => 'domPDF in Laravel 10'];
        $pdf = App::make('dompdf.wrapper');
        $pdf = $pdf->loadView('pdf.template',$data);
        //return $pdf->download('invoice2.pdf');
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
