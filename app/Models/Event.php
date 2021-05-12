<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'about', 'file', 'user_id', 'event_date'];

    public function scopeOfUser($query, $user)
    {
        return $query->where('user_id', $user->id);
    }

    /**
     * Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
