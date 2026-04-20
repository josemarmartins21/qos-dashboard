<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Question extends Model
{
    protected $fillable = [
        'question',
        'response',
        'user_id',
        'is_active',
    ];

    private const LIMIT = 11;
    private const MIN_ACTIVE = 3;
    private const MAX_ACTIVE = 6;

    public static function getLimit()
    {
        return self::LIMIT;
    }

    public static function getMinActive(): int
    {
        return self::MIN_ACTIVE;
    }

    public static function getMaxActive(): int
    {
        return self::MAX_ACTIVE;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getQuantityActive(): int
    {
        return self::where('is_active', 1)->count();
    }
}
