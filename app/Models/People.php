<?php

namespace App\Models;
use EloquentFilter\Filterable;

use Dyrynda\Database\Support\CascadeSoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Mockery\Generator\StringManipulation\Pass\Pass;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class People extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;
    use CascadeSoftDeletes;
    use Filterable;

    protected $table = 'people';

    protected $cascadeDeletes = ['documents', 'addresses', 'peopleable'];

    protected $fillable = [
        'full_name',
        'genre',
        'matrial_status',
        'user_id',
        'peopleable_id',
        'peopleable_type'
    ];

    protected $dates = [
        'birthdate',
        'deleted_at'
    ];

    public function peopleable(): MorphTo
    {
        return $this->morphTo('peopleable');
    }

    public function emails(): HasMany
    {
        return $this->hasMany(Email::class, 'people_id');
    }

    public function addresses(): BelongsToMany
    {
        return $this->belongsToMany(Address::class);
    }

    public function departaments(): HasMany
    {
        return $this->hasMany(Departament::class);
    }

    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'people_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'people_id')->withDefault();
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'people_id');
    }

    public function genreData(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre');
    }

    public function matrialStatus(): BelongsTo
    {
        return $this->belongsTo(MatrialStatus::class, 'matrial_status');
    }

    public function getFirstNameAttribute(): string
    {
        if ($this->peopleable_type === IndividualPeople::class) {
            return Str::before($this->full_name, ' ');
        }
        return $this->name;
    }

    public function getLastNameAttribute(): string
    {
        if ($this->peopleable_type === IndividualPeople::class) {
            $name = explode(' ', $this->full_name);
            return array_pop($name);
        }
        return '';
    }

    public function getFullNameAttribute($value): string
    {
        if ($this->peopleable_type === IndividualPeople::class) {
            return mb_strtoupper($value);
        }
        return mb_strtoupper($this->peopleable->company_name ?? $value);
    }

    public function setFullNameAttribute($value): void
    {
        $this->attributes['full_name'] = mb_strtoupper($value);
    }

    public function isAnonPeople(){
        return (
            $this->peopleable_type === IndividualPeople::class &&
            $this->peopleable->anonPeople
        );
    }

}
