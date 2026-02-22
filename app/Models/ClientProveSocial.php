<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientProveSocial extends Model
{
    protected $fillable = [
        'logo',
        'url',
        'is_active',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
