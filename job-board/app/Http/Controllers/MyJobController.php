<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

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
        return view('my_job.index', ['jobs'=> Auth::user()->employer->jobs()->with(['employer', 'jobApplications', 'jobApplications.user'])->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:5000',
            'experience' => 'required|in:' . implode(',', \App\Models\Job::$experience),
            'category' => 'required|in:' . implode(',', \App\Models\Job::$category),
        ]);

        Auth::user()->employer->jobs()->create($validatedData);

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
        //
    }
}
