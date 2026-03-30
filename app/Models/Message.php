<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Visitor;

class Message extends Model
{
    protected $fillable = [
        'visitor_id',
        'subject',
        'body',
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
