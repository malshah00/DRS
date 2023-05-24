<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use Illuminate\Http\Request;


class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'room-number' => 'required',
            'complaint-type' => 'required',
            'complaint-description' => 'required',
            'file-upload' => 'nullable|file',
        ]);
    

            // Store form data in database
            $complaint = new Complaint;
            $complaint->name = $request->input('name');
            $complaint->phone = $request->input('phone');
            $complaint->room_number = $request->input('room-number');
            $complaint->complaint_type = $request->input('complaint-type');
            $complaint->complaint_description = $request->input('complaint-description');

            // Upload and store file, if provided
            if ($request->hasFile('file-upload')) {
                $file = $request->file('file-upload');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $fileName);
                $complaint->file_upload = $fileName;
            }

            $complaint->save();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Complaint added successfully!');
    }
    public function viewAll()
    {
        // Retrieve all complaints
        $complaints = Complaint::all();
        
        // Return the view with complaint data
        return view('dashboard', compact('complaints'));
    }
    public function show()
    {
        $data=complaints::all();
        return view('dashboard',['complaints'=>$data]);
    }

}