<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class Departament extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'departaments';

    protected $fillable = [
        'departament',
        'code',
        'sigla',
        'unit_id',
        'responsible',
        'phone',
        'email'
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function setDepartmentAttribute($value): void
    {
        $this->attributes['departament'] = mb_strtoupper($value);
    }

    public function people(): HasMany
    {
        return $this->hasMany(People::class);
    }
}
