<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class Document extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'documents';

    protected $fillable = [
        'document',
        'expires_at',
        'document_type_id',
        'people_id'
    ];

    protected $dates = [
        'expires_at',
        'deleted_at'
    ];

    public function document_type(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    public function setDocumentAttribute($value): void
    {
        $this->attributes['document'] = preg_replace("/[\W_]+/u", '', $value);
    }
}
