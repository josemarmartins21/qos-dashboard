<?php

namespace App\Models;

use App\Models\Testimony;
use App\Models\ClientProveSocial;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'company_role',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client_prove_social()
    {
        return $this->hasOne(ClientProveSocial::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimony::class);
    }
}
