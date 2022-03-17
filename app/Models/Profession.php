<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Profession extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'professions';

    protected $fillable = [
        'type'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
