<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;


    protected $fillable = [
        'complainant',
        'title',
        'description',
        'status',
        'resolved_by',
        'user_id',
        'course'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function scopeSearch($query, $value) {
        $query->where('title', 'like', "%{$value}%");
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
