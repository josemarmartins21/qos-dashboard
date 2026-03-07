<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Visitor extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
