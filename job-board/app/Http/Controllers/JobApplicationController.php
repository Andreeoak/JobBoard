<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;
    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job'=>$job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $this->authorize('apply', $job);

        $validatedData = $request->validate([
            'expected_salary'=>'required|min:1|max:10000',
            "cv" => 'required|file|mimes:pdf|max:2500'
        ]);


        $job->jobApplications()->create([
            'user_id'=> $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $request->file('cv')->store('cvs', 'private')
        ]);

        return redirect()->route("jobs.show", $job)->with('success', 'You have successfully applied!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
