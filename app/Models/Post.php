<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const OPEN_STATUS = 'open';
    const CLOSED_STATUS = 'closed';
    const CLOSED_WITHOUT_SOLUTION_STATUS = 'closed_without_solution';

    const ICONS = [
        self::OPEN_STATUS => 'fire',
        self::CLOSED_STATUS => 'lock',
        self::CLOSED_WITHOUT_SOLUTION_STATUS => 'frown-o',
    ];

    protected $guarded = [];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function last_reply() {
        return $this->replies->last();
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function thread() {
        return $this->belongsTo(Thread::class);
    }

    public function getStatusIcon() {
        return self::ICONS[$this->status];
    }
}

