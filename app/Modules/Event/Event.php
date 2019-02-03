<?php

namespace App\Modules\Event;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
