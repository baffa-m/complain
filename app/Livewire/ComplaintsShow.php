<?php

namespace App\Livewire;

use App\Models\Message;
use Livewire\Component;
use App\Models\Complaint;

class ComplaintsShow extends Component
{
    public $content;
    public $complaint;
    public $messages;

    protected $listeners = ['messagePosted' => 'refreshChats'];

    public function mount(Complaint $complaint)
    {
        $this->complaint = $complaint;
        $this->messages = $complaint->messages;
    }

    public function render()
    {
        return view('livewire.complaints-show', ['complaint' => $this->complaint]);
    }

    public function sendMessage()
    {


        $senderType = auth()->user()->role === 'STAFF' ? 'STAFF' : 'STUDENT';

        $message = new Message([
            'content' => $this->content,
            'sender_type' => $senderType,
            'user_id' => auth()->user()->id,
        ]);

        if ($senderType === 'STAFF') {
            $message->user()->associate(auth()->user());
        }

        $this->complaint->messages()->save($message);

        $this->content = '';

        $this->emitUp('messagePosted');
    }

    public function refreshChats()
    {
        $this->complaint->refresh(); // Refresh the complaint model
        $this->messages = $this->complaint->messages->toArray();
    }
}
