<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'response',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
