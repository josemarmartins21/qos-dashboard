<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProveSocial extends Model
{
    private const LIMIT = 10;
    private const MIN = 4;

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

}
