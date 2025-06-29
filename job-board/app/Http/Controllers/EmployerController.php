<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Auth::user()->employer()->create(
            $request->validate([
                'company_name' => 'required|string|max:255|min:3|unique:employers,company_name',
            ])
        );

        return redirect()->route('jobs.index')->with('success', 'Your Employer profile has been created successfully.');
    }


}
