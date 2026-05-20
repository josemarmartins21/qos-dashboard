<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CompanyInfo extends Model
{
    protected $fillable = [
        'key', 
        'value', 
        'user_id'
    ];

    public static function getPathImage(): string
    {
        return 'company_images';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
