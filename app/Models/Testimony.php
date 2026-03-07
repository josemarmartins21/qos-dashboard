<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable = [
        'testimony',
        'is_active',
        'client_id',
    ];

    private const LIMIT = 10;
    private const MIN_QUANTITY = 4;
    private const MAX_QUANTITY = 5;

    public static function getLimit()
    {
        return self::LIMIT;
    }
    public static function getMinActive(): int
    {
        return self::MIN_QUANTITY;
    }

    public static function getMaxActive(): int
    {
        return self::MAX_QUANTITY;
    }

    public static function getQuantityActive(): int
    {
        return self::where('is_active',1)->count();
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
