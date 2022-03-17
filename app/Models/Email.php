<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class Email extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'emails';

    protected $fillable = [
        'email',
        'type',
        'people_id'
    ];

    public function people(): BelongsTo
    {
        return $this->belongsTo(people::class, 'people_id');
    }

    public function setEmailAttribute($value): void
    {
        $this->attributes['email'] = mb_strtolower($value);
    }
}
