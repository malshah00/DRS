<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Retrieve all staff records
    $staff = Staff::all();

    // Return the view with staff data
    return view('dashboard', ['staff' => $staff]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new staff record
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the form data
         $validatedData = $request->validate([
            'sname' => 'required',
            'staffemail' => 'required|email|unique:staff,staffemail',
            'sphone' => 'required',
            'expert' => 'required',
        ]);

        // Create a new staff record
        Staff::create($validatedData);

        // Redirect to the index page with success message
        return redirect()->route('dashboard')->with('success', 'Staff added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $staff=Staff::all();
        return view('dashboard', compact('staff'));
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
