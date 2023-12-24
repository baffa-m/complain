<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function home()
     {
         $user_id = auth()->user()->id;
         $unresolved_complaints = Complaints::where('user_id', '==', $user_id)->where('status', '==', null)->count();
         $resolved_complaints = Complaints::where('user_id', '==', $user_id)->where('status', '!=', null)->count();
         $total_complaints = Complaints::where('user_id', '==', $user_id)->count();
         return view('complaints.home', compact('unresolved_complaints', 'resolved_complaints', 'total_complaints'));
     }

    public function index()
    {
        $user_id = auth()->user()->id;
        $complaints = Complaints::where('user_id', $user_id)->get();
        $all_complaints = Complaints::get();

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
        $complaint = Complaints::create([
            'complainant' => auth()->user()->name,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('complaints.index')->with('success', 'Complaint Submitted Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaints $complaint)
{
    return view('complaints.edit', compact('complaint'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(ComplaintRequest $request, Complaints $complaint)
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
    public function destroy(Complaints $complaints)
    {
        //
    }
}
