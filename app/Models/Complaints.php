<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;


    protected $fillable = [
        'complainant',
        'title',
        'description',
        'status',
        'resolved_by',
        'user_id'
    ];
}
