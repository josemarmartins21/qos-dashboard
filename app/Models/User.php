<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\CompanyInfo;
use App\Models\Permission;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'permission_id',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    public function companyInfos()
    {
        return $this->hasMany(CompanyInfo::class);
    }

    public function hasPermission(string $permission): bool
    {
        return $this->permission()->where('name', $permission)->exists();
    }

    public function assignPermission(string $permission): void 
    {
        $permission = $this->permission()->where('name', $permission)->first();

        $this->permission()->associate($permission);
    }

    public function removePermission(string $permission): void
    {
        $permission = $this->permission()->where('name', $permission)->first();

        if ($permission) {
            $this->permission()->dissociate($permission);
        }
    }

    public static function getPathImage(): string
    {
        return 'images/users/';
    }
}
