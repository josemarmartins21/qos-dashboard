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
    ];

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
