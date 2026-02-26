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

    private const LIMIT = 11;
    private const MIN = 4;

    public static function getLimit()
    {
        return self::LIMIT;
    }
    public static function getMin()
    {
        return self::MIN;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
