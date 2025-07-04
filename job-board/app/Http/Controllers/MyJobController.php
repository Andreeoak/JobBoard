<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Http\Requests\JobRequest;

use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('employer');
    }

    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view('my_job.index', ['jobs'=> Auth::user()->employer->jobs()->with(['employer', 'jobApplications', 'jobApplications.user'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

   public function store(JobRequest $request)
    {
        Auth::user()->employer->jobs()->create($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', [
            'job' => $myJob
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $this->authorize('delete', $myJob);
        $myJob->delete();
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted successfully.');
    }
}
