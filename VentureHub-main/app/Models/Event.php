<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function organizer() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function attendees() {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
