<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ComplaintRequest;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function home()
     {
        $unresolved_complaints = Complaint::where('status', 'active')->count();
        $resolved_complaints = Complaint::where('status', 'completed')->count();
        $total_complaints = Complaint::all()->count();
         return view('complaints.home', compact('unresolved_complaints', 'resolved_complaints', 'total_complaints'));
     }

    public function index()
    {
        $user_id = auth()->user()->id;
        $complaints = Complaint::where('user_id', $user_id)->get();
        $all_complaints = Complaint::get();

        if (auth()->user()->role == 'STUDENT') {
            return view('complaints.complaints', compact('complaints'));
        } else {
            return view('complaints.complaints', compact('all_complaints'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complaints.new-complaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ComplaintRequest $request)
    {
        $complaint = Complaint::create([
            'complainant' => auth()->user()->name,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
            'course' => $request->input('course'),
            'status' => 'active'
        ]);

        return redirect()->route('complaints.index')->with('success', 'Complaint Submitted Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        $messages = $complaint->messages()->with('user')->orderBy('created_at')->get();

        return view('complaints.show', compact('complaint', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
{
    return view('complaints.edit', compact('complaint'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(ComplaintRequest $request, Complaint $complaint)
    {
        $complaint->update([
            'complainant' => auth()->user()->name,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);

        // Redirect to the complaints index or show page
        return redirect()->route('complaints.index')->with('success', 'Complaint Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaints)
    {
        //
    }

    public function markCompleted(Complaint $complaint)
    {
        $complaint->update([
            'status' => 'completed',
            'resolved_by' => Auth::user()->name,
        ]);

        // You can add a flash message or any additional logic here

        return redirect()->route('complaints.index');
    }
}
