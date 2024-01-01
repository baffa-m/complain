<?php

namespace App\Livewire;

use App\Models\Complaint;
use Livewire\Component;
use Livewire\WithPagination;

class ComplaintTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $status = 'active'; // changed from $active to $status

    public function render()
    {
        $user = auth()->user();
        $complaintsQuery = null;
        $allComplaintsQuery = null;

        if ($user->role != 'STUDENT') {
            // Fetch all complaints for staff and admin users
            $allComplaintsQuery = Complaint::search($this->search)
                ->when($this->status != null, function ($query) {
                    return $query->where('status', $this->status);
                })
                ->latest()
                ->paginate($this->perPage);

        } else {
            // Fetch complaints for a particular user
            $complaintsQuery = Complaint::where('user_id', $user->id)
                ->search($this->search)
                ->when($this->status != null, function ($query) {
                    return $query->where('status', $this->status);
                })
                ->latest()
                ->paginate($this->perPage);
        }

        return view('livewire.complaint-table', [
            'complaints' => $complaintsQuery,
            'all_complaints' => $allComplaintsQuery,
        ]);
    }
}
