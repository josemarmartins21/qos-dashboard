<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Permission extends Model
{
    protected $fillable = ['name'];
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
