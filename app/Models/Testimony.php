<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
        'testimony',
        'is_active',
        'client_id',
    ];

    private const LIMIT = 10;

    public static function getLimit()
    {
        return self::LIMIT;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
