<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Complaint $complaint)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Assuming authentication for sender type
        $senderType = auth()->user()->role === 'STAFF' ? 'STAFF' : 'STUDENT';

        $message = new Message([
            'content' => $request->input('content'),
            'sender_type' => $senderType,
            'user_id' => auth()->user()->id,
        ]);

        // Associate user (staff or complainant) with the message
        if ($senderType === 'staff') {
            $message->user()->associate(auth()->user());
        }

        $complaint->messages()->save($message);

        return redirect()->route('complaints.show', $complaint);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
