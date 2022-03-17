<?php

namespace App\Models;

use App\Notifications\PasswordCreateNotification;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\TwoFactorAuthenticatable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class User
 * @package App\Models
 * @property People people
 * phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */
class User extends Authenticatable implements Auditable
{
    use HasRoles, HasFactory, SoftDeletes, AuditableTrait, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'people_id',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $guarded = [
        'password'
    ];

    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class, 'people_id');
    }

    public function isTrader(): bool
    {
        return $this->people?->touristic_trader ? true : false;
    }

    public function isEmployee(): bool
    {
        return $this->people?->employee ? true : false;
    }
    public function userType(): string
    {
        return match (true){
            $this->isTrader() => TouristicTrader::class,
            $this->isEmployee() => Employee::class,
        default => __CLASS__
        };
    }

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new PasswordResetNotification($token));
    }

    public function sendCreatePasswordNotification(): void
    {
        $token = Password::createToken($this);
        $this->notify(new PasswordCreateNotification($token));
    }

    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = mb_strtoupper($value);
    }

    public function setEmailAttribute($value): void
    {
        $this->attributes['email'] = mb_strtolower($value);
    }

    public function occupations():BelongsToMany
    {
        return $this->belongsToMany(Occupation::class);
    }

    public function notifications(): BelongsToMany
    {
        return $this->belongsToMany(Notification::class);
    }

    public function myNotificationsSendeds(): HasMany
    {
        return $this->hasMany(Notification::class, 'sender_id');
    }
}
