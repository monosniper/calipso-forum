<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Musonza\Chat\Traits\Messageable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Messageable;

    const USER_TYPE = 'user';
    const BOT_TYPE = 'bot';

    const TYPES = [
        self::USER_TYPE,
        self::BOT_TYPE,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function getRole() {
        return Role::ROLE_NAMES[$this->role_id];
    }

    public function getAvatarUrl() {
        return '/'.$this->avatar;
//        return $this->avatar ? Storage::disk('public')->url($this->avatar) : '#';
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function invites() {
        return $this->hasMany(Invite::class);
    }
}
