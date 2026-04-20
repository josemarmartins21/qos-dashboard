<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Visitor;
use App\Models\Subject;

class Message extends Model
{
    protected $fillable = [
        'visitor_id',
        'body',
        'subject_id',
        'read',
    ];

    public static function getUnreadMessages()
    {
        return self::where('read', false)->count();
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
