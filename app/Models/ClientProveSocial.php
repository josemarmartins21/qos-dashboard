<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProveSocial extends Model
{
    private const LIMIT = 10;
    private const MIN = 4;
    private const MAX_ACTIVE = 5;
    private const MIN_ACTIVE = 4;

    protected $fillable = [
        'logo',
        'url',
        'is_active',
        'client_id',
    ];

    public static function getMin()
    {
        return self::MIN;
    }

    public static function getLimit()
    {
        return self::LIMIT;   
    }
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public static function getPathImages(): string
    {
        return 'images/logos_client/';
    }

    public static function getMinActive(): int
    {
        return self::MIN_ACTIVE;
    }
    public static function getMaxActive(): int
    {
        return self::MAX_ACTIVE;
    }

    public static function getQuantityActive(): int
    {
        return self::where('is_active', 1)->count();
    }

}
