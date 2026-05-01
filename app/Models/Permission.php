<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    
    protected $fillable = ['name'];
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
