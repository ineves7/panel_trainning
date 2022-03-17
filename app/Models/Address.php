<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class Address extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'addresses';

    protected $fillable = [
        'description',
        'street',
        'complement',
        'number',
        'postal_code',
        'neighborhood',
        'city_id',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function setDescriptionAttribute($value): void
    {
        $this->attributes['description'] = mb_strtoupper($value);
    }

    public function setStreetAttribute($value): void
    {
        $this->attributes['street'] = mb_strtoupper($value);
    }

    public function setComplementAttribute($value): void
    {
        $this->attributes['complement'] = mb_strtoupper($value);
    }

    public function setNeighborhoodAttribute($value): void
    {
        $this->attributes['neighborhood'] = mb_strtoupper($value);
    }

    public function people(): BelongsToMany
    {
        return $this->belongsToMany(People::class, 'people_id');
    }

    public function travel(): BelongsToMany
    {
        return $this->belongsToMany(Travel::class, 'travel_id');
    }
}
