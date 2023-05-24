<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class EditComplaintController extends Controller
{
    public function edit($id)
    {
        $complaint = Complaint::find($id);

        return view('edit-complaint', compact('complaint'));
    }

    public function update(Request $request, $id)
    {
        $complaint = Complaint::find($id);

        $complaint->name = $request->input('name');
        $complaint->phone = $request->input('phone');
        $complaint->room_number = $request->input('room-number');
        $complaint->complaint_type = $request->input('complaint-type');
        $complaint->complaint_description = $request->input('complaint-description');

        // Handle file upload
        if ($request->hasFile('file-upload')) {
            $file = $request->file('file-upload');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/complaints', $filename);
            $complaint->file_upload = $filename;
        }

        $complaint->save();

        return redirect('/complaints')->with('success', 'Complaint updated successfully');
    }
}
