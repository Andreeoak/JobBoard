<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view("my_job_applications.index",
        [
                'applications'=>\Illuminate\Support\Facades\Auth::user()->jobApplications()
                ->with([
                    'job' => function($q) {
                        $q->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary');
                    },
                    'job.employer'
                ])->latest()->get()
        ]
        );
    }

    public function destroy(JobApplication $my_job_application)
    {
        $my_job_application->delete();

        return redirect()->back()->with('success', 'Job application removed');
    }

}
