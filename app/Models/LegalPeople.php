<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class LegalPeople extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'legal_people';

    protected $fillable = [
        'company_name',
    ];

    public function peopleable(): MorphOne
    {
        return $this->morphOne(People::class, 'peopleable');
    }

    public function setCompanyNameAttribute($value): void
    {
        $this->attributes['company_name'] = mb_strtolower($value);
    }
}
