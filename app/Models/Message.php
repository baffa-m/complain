<?php

namespace App\Models;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    protected $fillable = [
        'content',
        'user_id',
        'complaint_id',
        'sender_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
