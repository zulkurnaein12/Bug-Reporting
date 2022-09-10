<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['bug_id', 'user_id', 'description', 'status', 'start', 'end'];

    public function bugs()
    {
        return $this->belongsTo(Bug::class, 'bug_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
